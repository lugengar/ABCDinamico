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
        
        

        // Inicializar el mapa centrado en Buenos Aires
        var map = L.map('map').setView([-34.6037, -58.3816], 13);
        var customIcon = L.icon({
            iconUrl: 'https://lugengar.github.io/ABC/imagenes/otros/puntero.svg',  // URL del icono personalizado
            iconSize: [25, 25],  // Tamaño del ícono más pequeño para prueba
            iconAnchor: [12, 25],  // Punto de anclaje ajustado
            popupAnchor: [0, -25]  // Popup ajustado
        });

        // Cargar un mapa base desde OpenStreetMap
        L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; <a href="https://carto.com/attributions">CartoDB</a>'
        }).addTo(map);
       
        

        // Funciones para los botones de zoom
        function zoomIn() {
            map.zoomIn();
        }

        function zoomOut() {
            map.zoomOut();
        }

        // Función para obtener las coordenadas mediante Nominatim
        function geocodeAddress(address, callback) {
            var url = `https://nominatim.openstreetmap.org/search?q=${encodeURIComponent(address)}&format=json&limit=1`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (data && data.length > 0) {
                        var lat = data[0].lat;
                        var lon = data[0].lon;
                        callback([lat, lon]);
                    } else {
                        alert("Dirección no encontrada");
                    }
                })
                .catch(error => console.error("Error en la geocodificación: ", error));
        }

        // Lugares con nombre o dirección
        var lugares = [
            { name: "Obelisco", address: "Obelisco, Buenos Aires", url: "https://es.wikipedia.org/wiki/Obelisco_de_Buenos_Aires" },
            { name: "Casa Rosada", address: "Casa Rosada, Buenos Aires", url: "https://es.wikipedia.org/wiki/Casa_Rosada" },
            { name: "Puerto Madero", address: "Puerto Madero, Buenos Aires", url: "https://es.wikipedia.org/wiki/Puerto_Madero" }
        ];

        // Geocodificar cada lugar y agregar el puntero
        lugares.forEach(function(lugar) {
            geocodeAddress(lugar.address, function(coords) {
                var marker = L.marker(coords,{icon: customIcon}).addTo(map)
                    .bindPopup('<b>' + lugar.name + '</b><br>Haz click para más info.');

                // Redirigir a una página al hacer clic en el puntero
                marker.on('click', function() {
                    window.location.href = lugar.url;
                });
            });
        });
    </script>

</body>
</html>
