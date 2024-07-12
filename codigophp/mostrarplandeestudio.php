<?php
// Incluir archivo de conexión a la base de datos
$result = null;
include "./codigophp/conexionbs.php";

// Validar y limpiar el parámetro de búsqueda
if (isset($_GET['carrera'])) {

    $busqueda = $_GET['carrera'];

    // Preparar la consulta usando una consulta preparada
    $stmt = $conn->prepare("SELECT * FROM planestudio WHERE fk_carrera LIKE ?");
    
    // Añadir comodines para buscar cualquier parte de la cadena
    $param = "%$busqueda%";
    
    // Asignar parámetro y ejecutar consulta
    $stmt->bind_param("s", $param);
    $stmt->execute();

    // Obtener resultados
    $result = $stmt->get_result();
   
    // Mostrar resultados (ejemplo básico)
    if ($result->num_rows == 0) {
    
        echo "<p class= 'error' >No se encontraron resultados para la búsqueda: " . htmlspecialchars($busqueda)."</p>";
    }else{
        while ($row = $result->fetch_assoc()) {
            info_carrera();
        }
    }
    $stmt->close();
$conn->close();
}


?>
