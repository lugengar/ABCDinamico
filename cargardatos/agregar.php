<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Agregar Datos</title>
    <link rel="stylesheet" href="formulario.css">
</head>
<body>
    <?php
        include "../codigophp/conexionbs.php";
        session_start();
        $_SESSION["id_usuario"] = "a";

        $distritos_result = mysqli_query($conn, "SELECT * FROM distrito");
        $establecimientos_result = mysqli_query($conn, "SELECT * FROM establecimiento WHERE id_establecimiento != 0");
        $carrera_result = mysqli_query($conn, "SELECT * FROM carrera");
        $tipo_contacto_result = mysqli_query($conn, "SELECT DISTINCT tipo FROM contacto");

        $distritos = mysqli_fetch_all($distritos_result, MYSQLI_ASSOC);
        $establecimientos = mysqli_fetch_all($establecimientos_result, MYSQLI_ASSOC);
        $carreras = mysqli_fetch_all($carrera_result, MYSQLI_ASSOC);
        $tipos_contacto = mysqli_fetch_all($tipo_contacto_result, MYSQLI_ASSOC);
    ?>

    <div class="form-container">
        <h2>Formulario de Agregar Datos</h2>
        <form action="prossagregar.php" method="post" id="dataForm" enctype="multipart/form-data">
            <label for="tabla">Seleccionar tabla:</label>
            

            <div id="formFields"></div>

            <input type="submit" value="Enviar">
        </form>
    </div>

    <script>
        function mostrarCampos(tabla) {
       
            var formFields = document.getElementById("formFields");

            formFields.innerHTML = ''; 
            
            if (tabla === "carrera") {
                formFields.innerHTML = `
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                    <label for="descripcion">Descripción:</label>
                    <input type="text" id="descripcion" name="descripcion" required>
                    <label for="titulo">Título:</label>
                    <input type="text" id="titulo" name="titulo" required>
                    <label for="tipo_carrera">Tipo de Carrera:</label>
                    <select id="tipo_carrera" name="tipo_carrera" required>
                        <option value="Tecnicatura">Técnica</option>
                        <option value="Profesorado">Profesorado</option>
                        <option value="Licenciatura">Licenciatura</option>
                        <option value="Ingeniería">Ingeniería</option>
                        <option value="Otro">Otro</option>
                    </select>
                `;
            } else if (tabla === "contacto") {
                formFields.innerHTML = `
                    <label for="descripcion">Descripción:</label>
                    <input type="text" id="descripcion" name="descripcion" required>
                    <label for="tipo">Tipo:</label>
                    <select id="tipo" name="tipo" required>
                        <option value="">--Selecciona un tipo--</option>
                        <?php foreach ($tipos_contacto as $row) { ?>
                            <option value="<?php echo $row['tipo']; ?>">
                                <?php echo $row['tipo']; ?>
                            </option>
                        <?php } ?>
                    </select>
                    <label for="contacto">Contacto:</label>
                    <input type="text" id="contacto" name="contacto" required>
                    <label for="fk_establecimiento">FK Establecimiento:</label>
                    <select id="fk_establecimiento" name="fk_establecimiento" required>
                        <option value="">--Selecciona un establecimiento--</option>
                        <?php foreach ($establecimientos as $row) { ?>
                            <option value="<?php echo $row['id_establecimiento']; ?>">
                                <?php echo $row['id_establecimiento'] . " - " . $row['nombre']; ?>
                            </option>
                        <?php } ?>
                    </select>
                `;
            } else if (tabla === "establecimiento") {
                formFields.innerHTML = `
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                    <label for="ubicacion">Ubicación:</label>
                    <input type="text" id="ubicacion" name="ubicacion" required>
                    <label for="descripcion">Descripción:</label>
                    <input type="text" id="descripcion" name="descripcion" required>
                    <label for="tipo_establecimiento">Tipo de Establecimiento:</label>
                    <select id="tipo_establecimiento" name="tipo_establecimiento" required>
                        <option value="Universidad">Universidad</option>
                        <option value="Instituto">Instituto</option>
                        <option value="Centro Universitario">Centro Universitario</option>
                        <option value="Polo Educativo">Polo Educativo</option>
                    </select>
                    <label for="servicios">Servicios:</label>
                    <input type="text" id="servicios" name="servicios" required>
                    <label for="fk_distrito">Distrito:</label>
                    <select id="fk_distrito" name="fk_distrito" required>
                        <option value="">--Selecciona un distrito--</option>
                        <?php foreach ($distritos as $row) { ?>
                            <option value="<?php echo $row['id_distrito']; ?>">
                                <?php echo $row['nombre']; ?>
                            </option>
                        <?php } ?>
                    </select>
                    <label for="habilitado">Habilitado:</label>
                    <input type="checkbox" id="habilitado" name="habilitado" value="1">
                `;
            } else if (tabla === "planestudio") {
                formFields.innerHTML = `
                    <label for="id_carrera">ID Carrera:</label>
                    <select id="id_carrera" name="id_carrera" required>
                        <option value="">--Selecciona una carrera--</option>
                        <?php foreach ($carreras as $row) { ?>
                            <option value="<?php echo $row['id_carrera']; ?>">
                                <?php echo $row['nombre']; ?>
                            </option>
                        <?php } ?>
                    </select>
                    <label for="pdf_plan">Plan de Estudio (PDF):</label>
                    <input type="file" id="pdf_plan" name="pdf_plan" accept=".pdf" required>
                    <label for="diseño">Diseño del Plan de Estudio:</label>
                    <input type="text" id="diseño" name="diseño" required>
                    <label for="pdf_diseño">Diseño Curricular (PDF):</label>
                    <input type="file" id="pdf_diseño" name="pdf_diseño" accept=".pdf">
                    <label for="diseño_curricular">Diseño Curricular:</label>
                    <input type="text" id="diseño_curricular" name="diseño_curricular" required>
                    <label for="fk_establecimiento">FK Establecimiento:</label>
                    <select id="fk_establecimiento" name="fk_establecimiento" required>
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

                    <label for="imagen">Subir Imagen (JPG):</label>
                    <input type="file" id="imagen" name="imagen" accept=".jpg, .jpeg" required>
                    <label for="fk_establecimiento">FK Establecimiento:</label>
                    <select id="fk_establecimiento" name="fk_establecimiento" required>
                        <option value="">--Selecciona un establecimiento--</option>
                        <?php foreach ($establecimientos as $row) { ?>
                            <option value="<?php echo $row['id_establecimiento']; ?>">
                                <?php echo $row['id_establecimiento'] . " - " . $row['nombre']; ?>
                            </option>
                        <?php } ?>
                    </select>
                `;
            } else if (tabla === "distrito") {
                formFields.innerHTML = `
                    <label for="nombre">Nombre del distrito:</label>
                    <input type="text" id="nombre" name="nombre" required>
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
