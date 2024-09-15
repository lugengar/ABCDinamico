<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Modificación de Datos</title>
    <link rel="stylesheet" href="formulario.css">
</head>
<body>
    <?php
        include "../codigophp/conexionbs.php";
        session_start();
        $_SESSION["id_usuario"] = "a";

        $distritos_result = mysqli_query($conn, "SELECT * FROM distrito");
        $establecimientos_result = mysqli_query($conn, "SELECT * FROM establecimiento");
        $carrera_result = mysqli_query($conn, "SELECT * FROM carrera");
        $tipo_contacto_result = mysqli_query($conn, "SELECT DISTINCT tipo FROM contacto");
        $imagenes_result = mysqli_query($conn, "SELECT * FROM imagenes");

        $distritos = mysqli_fetch_all($distritos_result, MYSQLI_ASSOC);
        $establecimientos = mysqli_fetch_all($establecimientos_result, MYSQLI_ASSOC);
        $carreras = mysqli_fetch_all($carrera_result, MYSQLI_ASSOC);
        $tipos_contacto = mysqli_fetch_all($tipo_contacto_result, MYSQLI_ASSOC);
        $imagenes = mysqli_fetch_all($imagenes_result, MYSQLI_ASSOC);
    ?>

    <div class="form-container">
        <h2>Formulario de Modificación de Datos</h2>
        <form action="process_modify.php" method="post" id="dataForm" enctype="multipart/form-data">
            <label for="tabla">Seleccionar tabla:</label>
            <select id="tabla" name="tabla" onchange="mostrarCampos()" required>
                <option value="">--Selecciona una tabla--</option>
                <option value="carrera">Carrera</option>
                <option value="contacto">Contacto</option>
                <option value="establecimiento">Establecimiento</option>
                <option value="recursos">Plan de Estudio</option>
                <option value="imagenes">Imágenes</option>
                <option value="distrito">Distritos</option>
            </select>

            <div id="formFields"></div>

            <input type="submit" value="Enviar">
        </form>
    </div>

    <script>
        function mostrarCampos() {
            var tabla = document.getElementById("tabla").value;
            var formFields = document.getElementById("formFields");

            formFields.innerHTML = ''; 

            var html = '';
            switch (tabla) {
                case "carrera":
                    html = `
                        <label for="id_carrera">ID Carrera:</label>
                        <input type="text" id="id_carrera" name="id_carrera" required>
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
                    break;

                case "contacto":
                    html = `
                        <label for="id_contacto">ID Contacto:</label>
                        <input type="text" id="id_contacto" name="id_contacto" required>
                        <label for="descripcion">Descripción:</label>
                        <input type="text" id="descripcion" name="descripcion" required>
                        <label for="tipo">Tipo:</label>
                        <select id="tipo" name="tipo" required>
                            <option value="">--Selecciona un tipo--</option>
                            <?php foreach ($tipos_contacto as $row) { ?>
                                <option value="<?php echo htmlspecialchars($row['tipo']); ?>">
                                    <?php echo htmlspecialchars($row['tipo']); ?>
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
                                    <?php echo htmlspecialchars($row['id_establecimiento'] . " - " . $row['nombre']); ?>
                                </option>
                            <?php } ?>
                        </select>
                    `;
                    break;

                case "establecimiento":
                    html = `
                        <label for="id_establecimiento">ID Establecimiento:</label>
                        <input type="text" id="id_establecimiento" name="id_establecimiento" required>
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
                                    <?php echo htmlspecialchars($row['nombre']); ?>
                                </option>
                            <?php } ?>
                        </select>
                        <label for="habilitado">Habilitado:</label>
                        <input type="checkbox" id="habilitado" name="habilitado" value="1">
                    `;
                    break;

                case "recursos":
                    html = `
                        <label for="id_planestudio">ID Plan de Estudio:</label>
                        <input type="text" id="id_planestudio" name="id_planestudio" required>
                        <label for="id_carrera">ID Carrera:</label>
                        <select id="id_carrera" name="id_carrera" required>
                            <option value="">--Selecciona una carrera--</option>
                            <?php foreach ($carreras as $row) { ?>
                                <option value="<?php echo $row['id_carrera']; ?>">
                                    <?php echo htmlspecialchars($row['nombre']); ?>
                                </option>
                            <?php } ?>
                        </select>
                        <label for="pdf_plan">Plan de Estudio (PDF):</label>
                        <input type="file" id="pdf_plan" name="pdf_plan" accept=".pdf">
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
                                    <?php echo htmlspecialchars($row['id_establecimiento'] . " - " . $row['nombre']); ?>
                                </option>
                            <?php } ?>
                        </select>
                    `;
                    break;

                case "imagenes":
                    html = `
                        <label for="id_imagen">ID Imagen:</label>
                        <select id="id_imagen" name="id_imagen" required>
                            <option value="">--Selecciona una imagen--</option>
                            <?php foreach ($imagenes as $row) { ?>
                                <option value="<?php echo $row['id_imagen']; ?>">
                                    <?php echo htmlspecialchars($row['id_imagen'] . " - " . $row['url']); ?>
                                </option>
                            <?php } ?>
                        </select>
                        <label for="imagen">Subir Imagen (JPG):</label>
                        <input type="file" id="imagen" name="imagen" accept=".jpg" required>
                        <label for="fk_establecimiento">FK Establecimiento:</label>
                        <select id="fk_establecimiento" name="fk_establecimiento" required>
                            <option value="">--Selecciona un establecimiento--</option>
                            <?php foreach ($establecimientos as $row) { ?>
                                <option value="<?php echo $row['id_establecimiento']; ?>">
                                    <?php echo htmlspecialchars($row['id_establecimiento'] . " - " . $row['nombre']); ?>
                                </option>
                            <?php } ?>
                        </select>
                    `;
                    break;

                case "distrito":
                    html = `
                        <label for="id_distrito">ID Distrito:</label>
                        <select id="id_distrito" name="id_distrito" required>
                            <option value="">--Selecciona un distrito--</option>
                            <?php foreach ($distritos as $row) { ?>
                                <option value="<?php echo $row['id_distrito']; ?>">
                                    <?php echo htmlspecialchars($row['id_distrito'] . " - " . $row['nombre']); ?>
                                </option>
                            <?php } ?>
                        </select>
                        <label for="nombre">Nombre del Distrito:</label>
                        <input type="text" id="nombre" name="nombre" required>
                    `;
                    break;

                default:
                    html = '<p>Por favor, selecciona una tabla.</p>';
            }

            formFields.innerHTML = html;
            if (<?php echo isset($_GET["tabla"]) ? 'true' : 'false'; ?>) {
                tabla =  "<?php echo $_GET["tabla"]; ?>";
                id1 = "<?php if(isset($_GET["id"])){echo $_GET["id"];}else{echo"null";} ?>" 
                id2 ="<?php if(isset($_GET["id2"])){echo $_GET["id2"];}else{echo"null";} ?>" 
                id3 ="<?php if(isset($_GET["id3"])){echo $_GET["id3"];}else{echo"null";} ?>" 
                if (tabla == "establecimiento") {
                    document.getElementById("id_establecimiento").value = id1;
                }else if (tabla == "recursos") {
                    document.getElementById("id_planestudio").value = id1;
                    document.getElementById("id_carrera").value =id2;
                    document.getElementById("fk_establecimiento").value = id3;
                }
            }
           
           
        }
        window.onload = function() {
            var tablaSeleccionada = document.getElementById("tabla").value;
            if (tablaSeleccionada) {
                mostrarCampos();
            }
        };
        <?php
         if(isset($_GET["tabla"])){
            echo 'document.getElementById("tabla").value = "'.$_GET["tabla"].'"';
        }
        ?>
    </script>
</body>
</html>
