<?php
// Incluir archivo de conexión a la base de datos
$result = null;

// Validar y limpiar el parámetro de búsqueda
if (isset($_GET['universidad'])) {
    include "./codigophp/conexionbs.php";
    include "./codigophp/crearmapa.php";
    $universidad = $_GET['universidad'];

    // Preparar la consulta usando una consulta preparada
    $stmt = $conn->prepare("
    SELECT e.id_establecimiento, e.ubicacion, e.nombre AS nombre_universidad, e.descripcion, d.nombre AS nombre_distrito
    FROM establecimiento e
    INNER JOIN distrito d ON e.fk_distrito = d.id_distrito
    WHERE e.id_establecimiento = ?
");

// Asignar parámetro y ejecutar consulta
$stmt->bind_param("s", $universidad);
$stmt->execute();

// Obtener resultados
$result = $stmt->get_result();

  

    if ($result->num_rows == 0) {
        echo "<p class= 'error' >No se encontraron resultados para la búsqueda: " . htmlspecialchars($busqueda)."</p>";
    }else{
        $row = $result->fetch_assoc();
    }
    // Cerrar consulta y conexión
    
    $stmt->close();
    $conn->close();
    
}else{
    echo "no se encontro la universidad";
}

?>
