<?php
include "../codigophp/conexionbs.php";

$tabla = $_GET['tabla'] ?? '';
$id = $_GET['id'] ?? '';

if ($tabla === "carrera") {
    $sql = "DELETE FROM carrera WHERE id_carrera = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Carrera eliminada exitosamente.";
    } else {
        echo "Error al eliminar la carrera.";
    }
    mysqli_stmt_close($stmt);

} elseif ($tabla === "distrito") {
    $sql = "DELETE FROM distrito WHERE id_distrito = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Distrito eliminado exitosamente.";
    } else {
        echo "Error al eliminar el distrito.";
    }
    mysqli_stmt_close($stmt);

} elseif ($tabla === "contacto") {
    $sql = "DELETE FROM contacto WHERE id_contacto = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Contacto eliminado exitosamente.";
    } else {
        echo "Error al eliminar el contacto.";
    }
    mysqli_stmt_close($stmt);

} elseif ($tabla === "imagenes") {
    $sql = "DELETE FROM imagenes WHERE id_imagen = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Imagen eliminada exitosamente.";
    } else {
        echo "Error al eliminar la imagen.";
    }
    mysqli_stmt_close($stmt);

} elseif ($tabla === "establecimiento") {
    $sql = "DELETE FROM establecimiento WHERE id_establecimiento = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Establecimiento eliminado exitosamente.";
    } else {
        echo "Error al eliminar el establecimiento.";
    }
    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>
