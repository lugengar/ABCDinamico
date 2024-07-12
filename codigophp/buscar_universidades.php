<?php
// Incluir archivo de conexión a la base de datos
$result = null;
include "./codigophp/conexionbs.php";
include "./codigophp/construccion.php";

// Validar y limpiar el parámetro de búsqueda
if (isset($_GET['busqueda'])) {

    $busqueda = $_GET['busqueda'];

    // Preparar la consulta usando una consulta preparada
    $stmt = $conn->prepare("SELECT * FROM establecimiento WHERE nombre LIKE ?");
    
    // Añadir comodines para buscar cualquier parte de la cadena
    $param = "%$busqueda%";
    
    // Asignar parámetro y ejecutar consulta
    $stmt->bind_param("s", $param);
    $stmt->execute();

    // Obtener resultados
    $result = $stmt->get_result();
   
    // Mostrar resultados (ejemplo básico)
    
}else{
    $stmt = $conn->prepare("SELECT * FROM establecimiento");
  
    $stmt->execute();

    $result = $stmt->get_result();
}
if ($result->num_rows == 0) {
    echo "<p class= 'error' >No se encontraron resultados para la búsqueda: " . htmlspecialchars($busqueda)."</p>";
}else{
    while ($row = $result->fetch_assoc()) {
        universidad($row["id_establecimiento"], $row["nombre"], $row["descripcion"], []); #$row["imagenes"]);
    }
}

// Cerrar consulta y conexión

$stmt->close();
$conn->close();
?>
