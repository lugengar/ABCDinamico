<?php
function mapa(){
    include "./codigophp/conexionbs.php";

    // Ajustamos la consulta para obtener el distrito con INNER JOIN
    $stmt = $conn->prepare("SELECT e.nombre AS establecimiento_nombre, e.ubicacion, e.id_establecimiento, d.nombre AS distrito_nombre 
                        FROM establecimiento e
                        INNER JOIN distrito d ON e.fk_distrito = d.id_distrito");

    if ($stmt->execute()) {
        $result2 = $stmt->get_result(); // Usar fetchAll() si estás usando PDO
    } else {
        echo "Error en la consulta: " . $stmt->error;
        return;
    }

    $lugares = array();  // Inicializamos un array para almacenar los lugares
    foreach($result2 as $row4) {
        // Creamos un array para cada establecimiento
        $lugares[] = array(
            'name' => $row4["establecimiento_nombre"],
            'address' => $row4["ubicacion"] . ', ' . $row4["distrito_nombre"] . ', Buenos aires', // Incluimos el distrito
            'url' => '/abcdinamico/universidad.php?universidad=' . $row4["id_establecimiento"]
        );
    }

    // Imprimimos el array en formato JSON
    echo 'var lugares = ' . json_encode($lugares, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . ';';

    $stmt->close();
    $conn->close();
}
?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa Interactivo de Buenos Aires</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <style>
        #map {
            height: 500px;
            width: 100%;
        }
        .zoom-buttons {
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 1000;
        }
        .zoom-buttons button {
            display: block;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

    <div class="zoom-buttons">
        <button onclick="zoomIn()">Acercar</button>
        <button onclick="zoomOut()">Alejar</button>
    </div>

    <div id="map"></div>

    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <script>
        <?php mapa(); ?>
        
// Inicializar el mapa sin los controles de zoom predeterminados
var map = L.map('map', {
    zoomControl: false  // Deshabilitar los controles de zoom predeterminados
}).setView([-34.6037, -58.3816], 13);

var customIcon = L.icon({
    iconUrl: 'https://lugengar.github.io/ABC/imagenes/otros/puntero.svg',  // URL del icono personalizado
    iconSize: [25, 25],  // Tamaño del ícono
    iconAnchor: [12, 25],  // Punto de anclaje ajustado
    popupAnchor: [0, -25]  // Popup ajustado
});

// Cargar un mapa base desde OpenStreetMap
L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
    attribution: '&copy; <a href="https://carto.com/attributions">CartoDB</a>'
}).addTo(map);

// Crear un objeto LatLngBounds para almacenar los límites de todos los punteros
var bounds = L.latLngBounds();

// Función para obtener las coordenadas mediante Nominatim
function geocodeAddress(address, callback) {
    var encodedAddress = encodeURIComponent(address);
    var url = `https://nominatim.openstreetmap.org/search?q=${encodedAddress}&format=json&limit=1`;

    console.log("URL de geocodificación:", url); // Imprimir la URL para depuración

    fetch(url)
        .then(response => {
            console.log("Respuesta del servidor:", response); // Verificar la respuesta del servidor
            if (!response.ok) {
                throw new Error('Network response was not ok: ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            console.log("Datos recibidos:", data); // Imprimir los datos recibidos
            if (data && data.length > 0) {
                var lat = data[0].lat;
                var lon = data[0].lon;
                callback([lat, lon]);
            } else {
                console.error(`No se encontró la dirección: ${address}`);
            }
        })
        .catch(error => {
            console.error("Error en la geocodificación para la dirección", address, ":", error.message);
        });
}


// Geocodificar cada lugar y agregar el puntero
lugares.forEach(function(lugar) {
    geocodeAddress(lugar.address, function(coords) {
        if (coords) {
            var marker = L.marker(coords, {icon: customIcon}).addTo(map)
                .bindPopup('<b>' + lugar.name + '</b><br>Haz click para más info.');

            // Extender los límites para incluir este puntero
            bounds.extend(coords);

            // Redirigir a una página al hacer clic en el puntero
            marker.on('click', function() {
                window.location.href = lugar.url;
            });
        }
    });
});

// Ajustar la vista del mapa a los límites calculados después de agregar todos los punteros
if (bounds.isValid()) {
    map.fitBounds(bounds);
}

// Funciones para los botones de zoom personalizados
function zoomIn() {
    map.zoomIn();
}

function zoomOut() {
    map.zoomOut();
}


    </script>

</body>
</html>
