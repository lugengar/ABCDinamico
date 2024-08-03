<?php
// Incluir archivo de conexión a la base de datos
$result = null;

// Validar y limpiar el parámetro de búsqueda
if (isset($_GET['universidad'])) {
    include "./codigophp/conexionbs.php";
    $universidad = $_GET['universidad'];

    // Preparar la consulta usando una consulta preparada
    $stmt = $conn->prepare("
    SELECT e.id_establecimiento, e.ubicacion, e.servicios, e.nombre AS nombre_universidad, e.descripcion, d.nombre AS nombre_distrito
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
        header("Location: index.php");
    }else{
        $row = $result->fetch_assoc();
        $sql2 = "SELECT * FROM imagenes WHERE fk_establecimiento = ".$row["id_establecimiento"];
        $imagenes = $conn->query($sql2);
        $sql3 = "SELECT * FROM contacto WHERE fk_establecimiento = ".$row["id_establecimiento"];
        $contactos = $conn->query($sql3);
    }
    // Cerrar consulta y conexión
    
    $stmt->close();
    $conn->close();
    
}else{
    header("Location: index.php");
}

?>
