<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Eliminación de Datos</title>
    <link rel="stylesheet" href="formulario.css">
</head>
<body>
    <?php
        include "../codigophp/conexionbs.php";
        session_start();


        $distritos_result = mysqli_query($conn, "SELECT * FROM distrito");
        $establecimientos_result = mysqli_query($conn, "SELECT * FROM establecimiento WHERE id_establecimiento != 0");
        $carrera_result = mysqli_query($conn, "SELECT * FROM carrera");
        $imagenes_result = mysqli_query($conn, "SELECT * FROM imagenes");
        $contacto_result = mysqli_query($conn, "SELECT * FROM contacto");
        $planestudio_result = mysqli_query($conn, "SELECT * FROM planestudio");


        $distritos = mysqli_fetch_all($distritos_result, MYSQLI_ASSOC);
        $establecimientos = mysqli_fetch_all($establecimientos_result, MYSQLI_ASSOC);
        $carreras = mysqli_fetch_all($carrera_result, MYSQLI_ASSOC);
        $imagenes = mysqli_fetch_all($imagenes_result, MYSQLI_ASSOC);
        $contactos = mysqli_fetch_all($contacto_result, MYSQLI_ASSOC);
        $planes_estudio = mysqli_fetch_all($planestudio_result, MYSQLI_ASSOC);
    ?>

    <div class="form-container">
        <h2>Formulario de Eliminación de Datos</h2>
        <form action="prosseliminar.php" method="post" id="deleteForm">
            <label for="tabla">Seleccionar tabla:</label>
           

            <div id="formFields"></div>

            <input type="submit" value="Eliminar">
        </form>
    </div>

    <script>
        function mostrarCampos() {
            var tabla = document.getElementById("tabla").value;
            var formFields = document.getElementById("formFields");

            formFields.innerHTML = '';

            if (tabla === "carrera") {
                formFields.innerHTML = `
                    <label for="id_carrera">Selecciona una carrera:</label>
                    <select id="id_carrera" name="id_carrera" required>
                        <option value="">--Selecciona una carrera--</option>
                        <?php foreach ($carreras as $row) { ?>
                            <option value="<?php echo $row['id_carrera']; ?>">
                                <?php echo $row['id_carrera'] . " - " . $row['nombre']; ?>
                            </option>
                        <?php } ?>
                    </select>
                `;
            } else if (tabla === "contacto") {
                formFields.innerHTML = `
                    <label for="id_contacto">Selecciona un contacto:</label>
                    <select id="id_contacto" name="id_contacto" required>
                        <option value="">--Selecciona un contacto--</option>
                        <?php foreach ($contactos as $row) { ?>
                            <option value="<?php echo $row['id_contacto']; ?>">
                                <?php echo $row['id_contacto'] . " - " . $row['descripcion']; ?>
                            </option>
                        <?php } ?>
                    </select>
                `;
            } else if (tabla === "establecimiento") {
                formFields.innerHTML = `
                    <label for="id_establecimiento">Selecciona un establecimiento:</label>
                    <select id="id_establecimiento" name="id_establecimiento" required>
                        <option value="">--Selecciona un establecimiento--</option>
                        <?php foreach ($establecimientos as $row) { ?>
                            <option value="<?php echo $row['id_establecimiento']; ?>">
                                <?php echo $row['id_establecimiento'] . " - " . $row['nombre']; ?>
                            </option>
                        <?php } ?>
                    </select>
                `;
            } else if (tabla === "imagenes") {
                formFields.innerHTML = `
                    <label for="id_imagen">Selecciona una imagen:</label>
                    <select id="id_imagen" name="id_imagen" required>
                        <option value="">--Selecciona una imagen--</option>
                        <?php foreach ($imagenes as $row) { ?>
                            <option value="<?php echo $row['id_imagen']; ?>">
                                <?php echo $row['id_imagen'] . " - " . $row['url']; ?>
                            </option>
                        <?php } ?>
                    </select>
                `;
            } else if (tabla === "distrito") {
                formFields.innerHTML = `
                    <label for="id_distrito">Selecciona un distrito:</label>
                    <select id="id_distrito" name="id_distrito" required>
                        <option value="">--Selecciona un distrito--</option>
                        <?php foreach ($distritos as $row) { ?>
                            <option value="<?php echo $row['id_distrito']; ?>">
                                <?php echo $row['id_distrito'] . " - " . $row['nombre']; ?>
                            </option>
                        <?php } ?>
                    </select>
                `;
            } else if (tabla === "planestudio") {
                formFields.innerHTML = `
                    <label for="id_planestudio">Selecciona un plan de estudio:</label>
                    <select id="id_planestudio" name="id_planestudio" required>
                        <option value="">--Selecciona un plan de estudio--</option>
                        <?php foreach ($planes_estudio as $row) { ?>
                            <option value="<?php echo $row['id_planestudio']; ?>">
                                <?php echo $row['id_planestudio'] . " - " . $row['diseño']; ?>
                            </option>
                        <?php } ?>
                    </select>
                `;
            }
        }
        <?php
         if(isset($_GET["tabla"])){
            echo 'mostrarCampos("'.$_GET["tabla"].'")';
        }
        ?>
    </script>
</body>
</html>
