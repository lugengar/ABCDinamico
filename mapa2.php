<?php
function getCoordinates($address) {
    // URL para hacer la petición a Nominatim
    $url = "https://nominatim.openstreetmap.org/search?q=" . urlencode($address) . "&format=json&limit=1";

    // Inicializar cURL
    $ch = curl_init();

    // Configurar cURL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3");

    // Ejecutar la petición
    $response = curl_exec($ch);

    // Comprobar si hubo errores
    if (curl_errno($ch)) {
        echo 'Error en la petición: ' . curl_error($ch);
        curl_close($ch);
        return null;
    }

    // Cerrar la conexión cURL
    curl_close($ch);

    // Convertir la respuesta a un array
    $data = json_decode($response, true);

    // Comprobar si hay resultados
    if (!empty($data)) {
        $lat = $data[0]['lat'];
        $lon = $data[0]['lon'];
        return [
            'lat' => $lat,
            'lon' => $lon
        ];
    } else {
        return null;
    }
}
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
    foreach($result2 as $row4) {
        $coordinates = getCoordinates( $row4["ubicacion"] . ', ' . $row4["distrito_nombre"] . ', Buenos aires');

        if ($coordinates) {
            echo "Latitud: " . $coordinates['lat'] . "<br>";
            echo "Longitud: " . $coordinates['lon'];
        } else {
            echo "No se encontraron coordenadas para la dirección.";
        }
       
    }

    $stmt->close();
    $conn->close();
}
// Ejemplo de uso
mapa();
?>
