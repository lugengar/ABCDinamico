<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir PDF</title>
</head>
<body>
    <form action="prueba.php" method="post" enctype="multipart/form-data">
        <label for="pdfFile">Selecciona un archivo PDF:</label>
        <input type="file" name="pdfFile" id="pdfFile" accept=".pdf" required>
        <button type="submit">Subir PDF</button>
    </form>
</body>
</html>
<?php
if (isset($_FILES['pdfFile'])) {
    $uploadDir = 'pdf/'; 
    $fileName = basename($_FILES['pdfFile']['name']);
    $targetFilePath = $uploadDir . $fileName;

    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    if ($fileType == 'pdf') {
        if (move_uploaded_file($_FILES['pdfFile']['tmp_name'], $targetFilePath)) {
            echo "El archivo " . $fileName . " ha sido subido con éxito.";
        } else {
            echo "Hubo un error subiendo el archivo.";
        }
    } else {
        echo "Solo se permiten archivos PDF.";
    }
} else {
    echo "No se seleccionó ningún archivo.";
}
?>
