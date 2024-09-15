<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estiloscss/cargardatos.css">
    <link rel="stylesheet" href="../estiloscss/animaciones.css">
    <link rel="icon" href="https://abc.gob.ar/core/themes/abc/favicon.ico" type="image/vnd.microsoft.icon">

    <title>Visualizador de Establecimientos</title>
</head>
<style>
.universidad3 {
    padding: 2vh;
    border-radius: 1vh;
    position: relative;
    box-shadow: 0 0.5vh 1vh rgba(0, 0, 0, 0.1);
    overflow:hidden;
}
.imagenuni4{
    width: 40vh;
    height:auto;
}
/* Estilo del nombre del establecimiento */
.universidad3 p {
    font-size: 2.5vh;
    margin-bottom: 1vh;
    font-weight: bold;
}

/* Estilo de los elementos <details> */
.universidad3 details {
    margin-top: 1vh;
    padding: 1vh;
    background-color: #ffffff;
    border: 0.1vh solid #ccc;
    border-radius: 0.5vh;
}

/* Estilo de los elementos <summary> */
.universidad3 summary {
    font-size: 2vh;
    cursor: pointer;
}

/* Lista de carreras */
.universidad3 ul {
    list-style-type: none;
    margin: 1vh 0;
    padding: 0;
}

/* Elementos de la lista */
.universidad3 li {
    font-size: 1.8vh;
    margin: 0.5vh 0;
}

/* Estilo para los elementos anidados en <details> */
.universidad3 details details {
    margin-top: 1vh;
    padding-left: 2vh;
    border-left: 0.2vh dashed #ccc;
}
/* Estilos de los botones */
.btn {
    display: inline-block;
    margin-top: 1vh;
    padding: 1vh 2vh;
    text-decoration: none;
    color: #fff;
    border-radius: 0.5vh;
    font-size: 1.8vh;
    cursor: pointer;
}

/* Botón de editar */
.btn.editar {
    background-color: #78568e; /* Verde */
}
.btn.añadir {
    background-color: #00adc1; /* Verde */
}

.btn.ver {
    background-color: #37799f; /* Verde */
}
/* Botón de eliminar */
.btn.eliminar {
    background-color: #e81f76; /* Rojo */
}

/* Espaciado para las acciones */
.actions {
    margin-top: 1vh;
    display: flex;
    gap: 1vh;
    flex-wrap: wrap; /* Permite que los botones se ajusten en pantallas pequeñas */
}
/* Estilos para el formulario de búsqueda */

</style>
<body><?php
include "../codigophp/conexionbs.php";
session_start();
$_SESSION["id_usuario"] = "a";

// Obtener el término de búsqueda si existe
$search = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';

// Modificar la consulta para incluir la búsqueda
$establecimientos_query = "SELECT * FROM establecimiento WHERE id_establecimiento != 0";

if (!empty($search)) {
    // Filtrar por nombre del establecimiento
    $establecimientos_query .= " AND nombre LIKE ?";
}

$establecimientos_stmt = mysqli_prepare($conn, $establecimientos_query);

if (!empty($search)) {
    $search_param = '%' . $search . '%';
    mysqli_stmt_bind_param($establecimientos_stmt, 's', $search_param);
}

mysqli_stmt_execute($establecimientos_stmt);
$establecimientos_result = mysqli_stmt_get_result($establecimientos_stmt);
$establecimientos = mysqli_fetch_all($establecimientos_result, MYSQLI_ASSOC);

// Consultas restantes
$carrera_result = mysqli_query($conn, "SELECT * FROM carrera");
$contacto_result = mysqli_query($conn, "SELECT * FROM contacto");
$imagenes_result = mysqli_query($conn, "SELECT * FROM imagenes");
$planes_estudio_result = mysqli_query($conn, "SELECT * FROM recursos");

$carreras = mysqli_fetch_all($carrera_result, MYSQLI_ASSOC);
$planes_estudio = mysqli_fetch_all($planes_estudio_result, MYSQLI_ASSOC);
$contacto_result = mysqli_fetch_all($contacto_result, MYSQLI_ASSOC);
$imagenes_result = mysqli_fetch_all($imagenes_result, MYSQLI_ASSOC);
?>



    <div class="container">
    <header class="header" id="header">
            <a href="../index.php" class="logo_pba_horizontal " ></a>
            <a href="../index.php" class="boton_nose_que_estudiar">Inicio<div class="circulopregunta" style="background-image: url(../imagenes/iconos/casa.svg); background-size: 4vh;"></div></a>
        </header>
        <div class="botones">
                <a class="boton" href="agregar.php?tabla=establecimiento">
                    <div class="imagenboton" style="background-image: url(../imagenes/iconos/tipoestable.svg);  background-size: 6vh;"></div>
                    <h1>Agregar establecimiento</h1>
                </a>
                <a class="boton" href="agregar.php?tabla=carrera">
                    <div class="imagenboton" style="background-image: url(../imagenes/iconos/diploma.svg);"></div>
                    <h1>Agregar carrera</h1>
</a>
<a class="boton" href="agregar.php?tabla=distrito">
                    <div class="imagenboton" style="background-image: url(../imagenes/iconos/ubicacion.svg);"></div>
                    <h1>Agregar distrito</h1>
</a>
<a class="boton" href="agregar.php?tabla=imagenes">
                    <div class="imagenboton" style="background-image: url(../imagenes/iconos/agregar.svg);  background-size: cover;"></div>
                    <h1>Agregar imagenes</h1>
</a>
            
        </div>
        <form class="barradebusqueda activo"  method="GET" action="">
               <p class="barratexto">Nombre del establecimiento <img src="imagenes/iconos/lupa.svg" class="imglupa" alt=""></p>
            <div style="gap:2vh;">
                <input type="text" name="busqueda" maxlength ="35" placeholder="Nombre" required>
                <input type="submit" value="Buscar">
                </div>
            </form>
            <div class="universidades">
    <?php foreach ($establecimientos as $establecimiento) { ?>
    <div class="universidad3" >
   

        <div class="establecimiento-content">
            <!-- Imagen del Establecimiento -->

            <!-- Contenido del Establecimiento -->
            <div class="detalle-establecimiento">
                <!-- Nombre del Establecimiento -->
                <p><strong><?php echo $establecimiento['nombre']; ?></strong></p>

                <!-- Botones de eliminar y editar para el establecimiento -->
                <div class="actions">
                <a href="../universidad.php?universidad=<?php echo $establecimiento['id_establecimiento']; ?>" class="btn ver" target="_blank">Visualizar establecimiento</a>

                    <a href="modificar.php?tabla=establecimiento&id=<?php echo $establecimiento['id_establecimiento']; ?>" class="btn editar">Editar Establecimiento</a>

                    <a href="prosseliminar.php?tabla=establecimiento&id=<?php echo $establecimiento['id_establecimiento']; ?>" class="btn eliminar">Eliminar Establecimiento</a>

                </div>

                <!-- Detalle de Carreras -->
                <details>
                    <summary>Carreras</summary>
                    <ul>
                        <?php 
                        // Filtrar carreras que pertenecen a este establecimiento
                        
// Agrupa los planes de estudio y diseños curriculares por carrera
$carreras_agregadas = [];

foreach ($planes_estudio as $plan) {
    foreach ($carreras as $carrera) {
        if ($plan['fk_establecimiento'] == $establecimiento['id_establecimiento'] && $plan['fk_carrera'] == $carrera['id_carrera']) {
            // Asegúrate de que la carrera aún no esté agregada
            if (!isset($carreras_agregadas[$carrera['id_carrera']])) {
                $carreras_agregadas[$carrera['id_carrera']] = [
                    'nombre' => $carrera['nombre'],
                    'planes' => [],
                    'diseños' => []
                ];
            }

            // Agrupa planes y diseños por carrera
            if ($plan['tipo_recurso'] === 'plan de estudio') {
                $carreras_agregadas[$carrera['id_carrera']]['planes'][] = $plan;
            } else if ($plan['tipo_recurso'] === 'diseño curricular') {
                $carreras_agregadas[$carrera['id_carrera']]['diseños'][] = $plan;
            }
        }
    }
}

// Imprime las carreras y sus planes y diseños
foreach ($carreras_agregadas as $id_carrera => $data) {
    echo '<li><h1>' . $data['nombre'].'</h1>';

    // Botones de eliminar y editar para la carrera
    echo '<div class="actions">';
    echo '<a href="agregar.php?tabla=planestudio&id=' . $establecimiento["id_establecimiento"] . '" class="btn añadir">Añadir recurso</a>';
    //echo '<a href="prosseliminar.php?tabla=planestudio&id=' . $id_carrera . '" class="btn eliminar">Eliminar Carrera del establecimiento</a>';

    echo '</div>';

    // Imprime los planes de estudio
    if (!empty($data['planes'])) {
        echo '<details><summary>Plan de Estudio</summary><ul>';
        foreach ($data['planes'] as $plan) {
            if($plan['pdf'] != ""){
            echo '<li><h1>' . $plan['pdf'].'</h1>';
            echo '<div class="actions">';
            echo '<a href="verpdf.php?pdf=' . $plan['pdf'] . '" class="btn ver" target="_blank">Visualizar Plan</a>';

            echo '<a href="modificar.php?tabla=recurso&id=' . $plan['id_recurso'] . '" class="btn editar">Editar Plan</a>';
            echo '<a href="prosseliminar.php?tabla=planestudio&id=' . $plan['id_recurso'] . '" class="btn eliminar">Eliminar Plan</a>';
            echo '</div>';
            echo '</li>';
            }
        }
        echo '</ul></details>';
    }

    // Imprime los diseños curriculares
    if (!empty($data['diseños'])) {
        echo '<details><summary>Diseño Curricular</summary><ul>';
        foreach ($data['diseños'] as $diseño) {
            if($diseño['pdf'] != ""){
            echo '<li><h1>' . $diseño['pdf'].'</h1>';
            echo '<div class="actions">';
            echo '<a href="verpdf.php?pdf=' . $diseño['pdf'] . '" class="btn ver" target="_blank">Visualizar Diseño</a>';

            echo '<a href="modificar.php?tabla=recurso&id=' . $diseño['id_recurso'] . '" class="btn editar">Editar Diseño</a>';
            echo '<a href="prosseliminar.php?tabla=planestudio&id=' . $diseño['id_recurso'] . '" class="btn eliminar">Eliminar Diseño</a>';
            echo '</div>';
            echo '</li>';
            }
        }
        echo '</ul></details>';
    }

    echo '</li>';
}


                        ?>
                    </ul>
                </details>
                <a href="editar_plan.php?id=' . $contacto['id_contacto'] . '" class="btn añadir">Añadir Carrera</a>
                
                <details>

                    <summary>Contactos</summary>
                    <ul>
                        <?php 
                        // Filtrar carreras que pertenecen a este establecimiento
                        foreach ($contacto_result as $contacto) {
                            if ($contacto['fk_establecimiento'] == $establecimiento['id_establecimiento']) {
                                echo '<li><h1>' .$contacto['tipo'].' - '. $contacto['contacto'].'</h1>';
                                
                                // Botones de eliminar y editar para la carrera
                                echo '<div class="actions">';
                                if($contacto["tipo"] != "telefono" && $contacto["tipo"] != "correo"){
                                echo '<a href="' . $contacto['contacto'] . '"target="_blank" class="btn ver">Visualizar Contacto</a>';

                                }
                                echo '<a href="editar_plan.php?id=' . $contacto['id_contacto'] . '" class="btn editar">Editar Contacto</a>';

                                echo '<a href="eliminar_carrera.php?id=' . $contacto['id_contacto'] . '" class="btn eliminar">Eliminar Contacto del establecimiento</a>';

                                echo '</div>';
                            }
                            
                        }
                        ?>
                    </ul>
                </details>
                <a href="editar_plan.php?id=' . $contacto['id_contacto'] . '" class="btn añadir">Añadir Contacto</a>
                <details>

<summary>Imagenes</summary>
<ul>
    <?php 
    // Filtrar carreras que pertenecen a este establecimiento
    foreach ($imagenes_result as $imagen) {
        if ($imagen['fk_establecimiento'] == $establecimiento['id_establecimiento']) {
            echo '<li><h1>' .$imagen['url'].'</h1>';
            echo '<img class="imagenuni4" src="../imagenes/universidades/'.$imagen['url'].'">';
            // Botones de eliminar y editar para la carrera
            echo '<div class="actions">';

            echo '<a href="eliminar_carrera.php?id=' . $contacto['id_contacto'] . '" class="btn eliminar">Eliminar imagen del establecimiento</a>';

            echo '</div>';
        }
        
    }
    ?>
</ul>
</details>
<a href="editar_plan.php?id=' . $contacto['id_contacto'] . '" class="btn añadir">Añadir imagen</a>
            </div>
        </div>
    </div>
    <?php } ?>
</div>


            
    </div>
</body>
</html>
