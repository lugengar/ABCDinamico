<?php

function mapa(){
    include "./codigophp/conexionbs.php";

    // Ajustamos la consulta para obtener el distrito con INNER JOIN
    $stmt = $conn->prepare("SELECT e.nombre AS establecimiento_nombre, e.ubicacion, e.id_establecimiento, d.nombre AS distrito_nombre, e.coordenadas
                            FROM establecimiento e
                            INNER JOIN distrito d ON e.fk_distrito = d.id_distrito");

    if ($stmt->execute()) {
        $result2 = $stmt->get_result(); // Obtenemos el resultado
    } else {
        echo "Error en la consulta: " . $stmt->error;
        return;
    }

    $lugares = array();  // Inicializamos un array para almacenar los lugares
    foreach($result2 as $row4) {
        $coordenadas = json_decode($row4["coordenadas"], true); // Aseguramos que se decodifique correctamente

        if ($coordenadas) {
            // Creamos un array para cada establecimiento con las coordenadas en formato array [lat, lon]
            $lugares[] = array(
                'name' => $row4["establecimiento_nombre"],
                'address' => [$coordenadas['x'], $coordenadas['y']],  // Cambiamos el objeto a un array [lat, lon]
                'url' => '/abcdinamico/universidad.php?universidad=' . $row4["id_establecimiento"]
            );
        }
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



// Geocodificar cada lugar y agregar el puntero
lugares.forEach(function(lugar) {
    if (lugar.address) {
        var marker = L.marker(lugar.address, {icon: customIcon}).addTo(map)
            .bindPopup('<b>' + lugar.name + '</b><br>Haz click para más info.');

        // Extender los límites para incluir este puntero
        bounds.extend(lugar.address);

        // Redirigir a una página al hacer clic en el puntero
        marker.on('click', function() {
            window.location.href = lugar.url;
        });
    }
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
