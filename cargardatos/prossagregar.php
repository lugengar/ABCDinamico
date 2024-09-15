<?php
include "../codigophp/conexionbs.php";
include "../codigophp/coordenadas.php";

$tabla = $_POST['tabla'] ?? '';

if ($tabla === "carrera") {
    $nombre = $_POST['nombre'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';
    $titulo = $_POST['titulo'] ?? '';
    $tipo_carrera = $_POST['tipo_carrera'] ?? '';

    $sql = "INSERT INTO carrera (nombre, descripcion, titulo, tipo_carrera) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssss", $nombre, $descripcion, $titulo, $tipo_carrera);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Carrera agregada exitosamente.";
    } else {
        echo "Error al agregar la carrera.";
    }
    mysqli_stmt_close($stmt);

} elseif ($tabla === "distrito") {
    $nombre = $_POST['nombre'];

    if (!checkDuplicate($conn, 'distrito', 'nombre', $nombre)) {
        $stmt = $conn->prepare("INSERT INTO distrito (nombre) VALUES (?)");
        $stmt->bind_param("s", $nombre);
        if ($stmt->execute()) {
            echo "Distrito cargado correctamente.";
        } else {
            echo "Error al cargar el distrito: " . $stmt->error;
        }
    } else {
        echo "Entrada duplicada para distrito con nombre: " . htmlspecialchars($nombre);
    }

} elseif ($tabla === "contacto") {
    $descripcion = $_POST['descripcion'] ?? '';
    $tipo = $_POST['tipo'] ?? '';
    $contacto = $_POST['contacto'] ?? '';
    $fk_establecimiento = $_POST['fk_establecimiento'] ?? '';

    $sql = "INSERT INTO contacto (descripcion, tipo, contacto, fk_establecimiento) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssi", $descripcion, $tipo, $contacto, $fk_establecimiento);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Contacto agregado exitosamente.";
    } else {
        echo "Error al agregar el contacto.";
    }
    mysqli_stmt_close($stmt);

} elseif ($tabla === "imagenes") {
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $imagen_file = $_FILES['imagen'];
        $imagen_name = basename($imagen_file['name']);
        $fk_establecimiento = $_POST['fk_establecimiento'];
        $upload_dir = ($fk_establecimiento == 0) ? '../imagenes/otros/' : '../imagenes/universidades/';
        $upload_file = $upload_dir . $imagen_name;

        if (move_uploaded_file($imagen_file['tmp_name'], $upload_file)) {
            if (!checkDuplicate($conn, 'imagenes', 'url', $imagen_name)) {
                $stmt = $conn->prepare("INSERT INTO imagenes (url, fk_establecimiento) VALUES (?, ?)");
                $stmt->bind_param("si", $imagen_name, $fk_establecimiento);
                if ($stmt->execute()) {
                    echo "Imagen cargada correctamente.";
                } else {
                    echo "Error al cargar la imagen: " . $stmt->error;
                }
            } else {
                echo "Entrada duplicada para imagen con nombre: " . htmlspecialchars($imagen_name);
            }
        } else {
            echo "Error al subir la imagen.";
        }
    } else {
        echo "Error en el archivo de imagen: " . $_FILES['imagen']['error'];
    }

} elseif ($tabla === "establecimiento") {
    $nombre = $_POST['nombre'] ?? '';
    $ubicacion = $_POST['ubicacion'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';
    $tipo_establecimiento = $_POST['tipo_establecimiento'] ?? '';
    $servicios = $_POST['servicios'] ?? '';
    $fk_distrito = $_POST['fk_distrito'] ?? '';
    $habilitado = $_POST['habilitado'] ?? '1';

    $coordenadas = obtenercoordenadas($ubicacion);
    $json_coordenadas = $coordenadas ? json_encode($coordenadas) : '{}';

    $imagen = $_FILES['imagen']['name'];
    $imagen_tmp = $_FILES['imagen']['tmp_name'];
    $imagen_nombre = uniqid() . ".jpg";
    $upload_dir = '../imagenes/universidades/';
    $upload_file = $upload_dir . $imagen_nombre;

    if (move_uploaded_file($imagen_tmp, $upload_file)) {
        $sql = "INSERT INTO establecimiento (nombre, ubicacion, descripcion, tipo_establecimiento, servicios, fk_distrito, coordenadas, habilitado) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sssssisi", $nombre, $ubicacion, $descripcion, $tipo_establecimiento, $servicios, $fk_distrito, $json_coordenadas, $habilitado);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            $id_establecimiento = mysqli_insert_id($conn);
            $sql_imagen = "INSERT INTO imagenes (url, fk_establecimiento) VALUES (?, ?)";
            $stmt_imagen = mysqli_prepare($conn, $sql_imagen);
            mysqli_stmt_bind_param($stmt_imagen, "si", $imagen_nombre, $id_establecimiento);
            mysqli_stmt_execute($stmt_imagen);

            if (mysqli_stmt_affected_rows($stmt_imagen) > 0) {
                echo "Establecimiento e imagen agregados exitosamente.";
            } else {
                echo "Error al agregar la imagen.";
            }
            mysqli_stmt_close($stmt_imagen);
        } else {
            echo "Error al agregar el establecimiento.";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error al cargar la imagen.";
    }

} elseif ($tabla === "planestudio") {
    $pdf = $_FILES['pdf']['name'];
    $pdf_tmp = $_FILES['pdf']['tmp_name'];
    $fk_carrera = $_POST['fk_carrera'] ?? '';
    $fk_establecimiento = $_POST['fk_establecimiento'] ?? '';

    $pdf_nombre = uniqid() . ".pdf";
    $upload_dir = "../pdf/";

    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $upload_file = $upload_dir . $pdf_nombre;

    if (move_uploaded_file($pdf_tmp, $upload_file)) {
        $sql = "INSERT INTO planestudio (pdf, fk_carrera, fk_establecimiento) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sii", $pdf_nombre, $fk_carrera, $fk_establecimiento);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo "Plan de estudio agregado exitosamente.";
        } else {
            echo "Error al agregar el plan de estudio.";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error al cargar el archivo PDF.";
    }
}

mysqli_close($conn);
?>
