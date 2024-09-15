<?php
include "../codigophp/conexionbs.php";
include "../codigophp/coordenadas.php";

$tabla = $_POST['tabla'] ?? '';

if ($tabla === "carrera") {
    $id_carrera = $_POST['id_carrera'] ?? '';
    $nombre = $_POST['nombre'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';
    $titulo = $_POST['titulo'] ?? '';
    $tipo_carrera = $_POST['tipo_carrera'] ?? '';

    $sql = "UPDATE carrera SET nombre = ?, descripcion = ?, titulo = ?, tipo_carrera = ? WHERE id_carrera = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssi", $nombre, $descripcion, $titulo, $tipo_carrera, $id_carrera);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Carrera modificada exitosamente.";
    } else {
        echo "Error al modificar la carrera.";
    }
    mysqli_stmt_close($stmt);

} elseif ($tabla === "distrito") {
    $id_distrito = $_POST['id_distrito'] ?? '';
    $nombre = $_POST['nombre'] ?? '';

    $sql = "UPDATE distrito SET nombre = ? WHERE id_distrito = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "si", $nombre, $id_distrito);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Distrito modificado exitosamente.";
    } else {
        echo "Error al modificar el distrito.";
    }
    mysqli_stmt_close($stmt);

} elseif ($tabla === "contacto") {
    $id_contacto = $_POST['id_contacto'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';
    $tipo = $_POST['tipo'] ?? '';
    $contacto = $_POST['contacto'] ?? '';
    $fk_establecimiento = $_POST['fk_establecimiento'] ?? '';

    $sql = "UPDATE contacto SET descripcion = ?, tipo = ?, contacto = ?, fk_establecimiento = ? WHERE id_contacto = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssi", $descripcion, $tipo, $contacto, $fk_establecimiento, $id_contacto);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Contacto modificado exitosamente.";
    } else {
        echo "Error al modificar el contacto.";
    }
    mysqli_stmt_close($stmt);

} elseif ($tabla === "imagenes") {
    $id_imagen = $_POST['id_imagen'] ?? '';
    $fk_establecimiento = $_POST['fk_establecimiento'] ?? '';

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $imagen_file = $_FILES['imagen'];
        $imagen_name = basename($imagen_file['name']);
        $upload_dir = ($fk_establecimiento == 0) ? '../imagenes/otros/' : '../imagenes/universidades/';
        $upload_file = $upload_dir . $imagen_name;

        if (move_uploaded_file($imagen_file['tmp_name'], $upload_file)) {
            $sql = "UPDATE imagenes SET url = ?, fk_establecimiento = ? WHERE id_imagen = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sii", $imagen_name, $fk_establecimiento, $id_imagen);
            mysqli_stmt_execute($stmt);

            if (mysqli_stmt_affected_rows($stmt) > 0) {
                echo "Imagen modificada exitosamente.";
            } else {
                echo "Error al modificar la imagen.";
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "Error al subir la imagen.";
        }
    } else {
        echo "Error en el archivo de imagen: " . $_FILES['imagen']['error'];
    }

} elseif ($tabla === "establecimiento") {
    $id_establecimiento = $_POST['id_establecimiento'] ?? '';
    $nombre = $_POST['nombre'] ?? '';
    $ubicacion = $_POST['ubicacion'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';
    $tipo_establecimiento = $_POST['tipo_establecimiento'] ?? '';
    $servicios = $_POST['servicios'] ?? '';
    $fk_distrito = $_POST['fk_distrito'] ?? '';
    $habilitado = $_POST['habilitado'] ?? '1';

    $coordenadas = obtenercoordenadas($ubicacion);
    $json_coordenadas = $coordenadas ? json_encode($coordenadas) : '{}';

    $sql = "UPDATE establecimiento SET nombre = ?, ubicacion = ?, descripcion = ?, tipo_establecimiento = ?, servicios = ?, fk_distrito = ?, coordenadas = ?, habilitado = ? WHERE id_establecimiento = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssssisia", $nombre, $ubicacion, $descripcion, $tipo_establecimiento, $servicios, $fk_distrito, $json_coordenadas, $habilitado, $id_establecimiento);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Establecimiento modificado exitosamente.";
    } else {
        echo "Error al modificar el establecimiento.";
    }
    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>