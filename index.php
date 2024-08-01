<!DOCTYPE html>
<html lang="en-es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estiloscss/styles.css">
    <title>abc</title>
</head>
<body>
    <div class="container">
        
    <!--query images-->
    <?php
        // Configuración de la conexión a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "abc_bd";

      
        $conexionDatos = new mysqli($servername, $username, $password, $dbname);

        if ($conexionDatos->connect_error) {
            die("Conexión fallida: " . $conexionDatos->connect_error);
        }

        
        $queryImagenes = "SELECT url FROM imagenes WHERE 1";
        $resultDatos = $conexionDatos->query($queryImagenes);

        $imagenes = array();

        if ($resultDatos->num_rows > 0) {
            while ($row = $resultDatos->fetch_assoc()) {
                $imagenes[] = $row;
            }
        } else {
            echo "0 resultados";
        }
        $conexionDatos->close();
    ?>

    <!--query distritos-->
    <?php
        
        // Configuración de la conexión a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "abc_bd";
        
        // Crear conexión
        $conexionDatos = new mysqli($servername, $username, $password, $dbname);
        
        // Verificar conexión
        if ($conexionDatos->connect_error) {
            die("Conexión fallida: " . $conexionDatos->connect_error);
        }
        
        // Consulta SQL para obtener los nombres de los distritos
        $queryDistritos = "SELECT * FROM distrito"; // Suponiendo que tienes una columna 'id' y 'nombre' en la tabla 'distrito'
        $resultDatos = $conexionDatos->query($queryDistritos);
        
        $distritos = array();
        
        if ($resultDatos->num_rows > 0) {
            // Recorrer todos los registros y añadirlos al array
            while ($row = $resultDatos->fetch_assoc()) {
                $distritos[] = $row;
            }
        } else {
            echo "0 resultados";
        }
        
        // Cerrar la conexión
        $conexionDatos->close();
        
    ?>


    <main class="carrusel">
            <div class="imagenes">
                <?php
                    echo '<div class="imagen activo" style="background-image: url(' . htmlspecialchars($imagenes[0]['url']) . ')"></div>';
                    echo '<div class="imagen" style="background-image: url(' . htmlspecialchars($imagenes[1]['url']) . ')"></div>';
                    echo '<div class="imagen" style="background-image: url(' . htmlspecialchars($imagenes[2]['url']) . ')"></div>';
               ?>
            </div>
            <div class="filtro">
                <div class="contenidotexto">
                    <h1 class="texto1">Ofertas de Educación Superior Región 6</h1>
                    
                </div>
                <div class="contenidotexto">
                    <h1 class="texto2">Ahora es más fácil encontrar la universidad adecuada.</h1>
                </div>
                <div class="circulos">
                    <span class="circulo activo"></span>
                    <span class="circulo"></span>
                    <span class="circulo"></span>
                   
                </div>
            </div>
            <div class="logo_pba_vertical"></div>
        </main>
        <header class="header"id="header">
            <a href="index.php" class="logo_pba_horizontal"></a>
            <a href="./codigophp/formulario.html" class="boton_nose_que_estudiar">No sé que estudiar <div class="circulopregunta" style="background-image: url(imagenes/iconos/pregunta.svg); background-size: 4dvh;"></div></a>
        </header>
        
        <main class="main">
           
            <div class="botones" id="botones">
                <button class="boton " onclick="barradebusqueda('distrito')">
                    <div class="imagenboton" style="background-image: url(imagenes/iconos/ubicacion.svg);"></div>
                    <h1>Buscar por distrito</h1>
                </button>
                <button class="boton" onclick="barradebusqueda('carrera')">
                    <div class="imagenboton" style=" background-image: url(imagenes/iconos/sombrero.svg);"></div>
                    <h1>Buscar por carrera o ingenieria</h1>
                </button>
                <button class="boton" onclick="barradebusqueda('tecnicatura')"><div class="imagenboton" style=" background-image: url(imagenes/iconos/diploma.svg);"></div>
                    <h1>Buscar por terciario o tecnicatura</h1>
                </button>
                <button class="boton" onclick="barradebusqueda('nombre')">
                    <div class="imagenboton" style=" background-image: url(imagenes/iconos/nombre.svg);"></div>
                    <h1>Buscar por nombre del establecimiento</h1>
                </button>
            </div>
            <form class="barradebusqueda activo" id="nombre">
                <img src="imagenes/iconos/lupa.svg" class="imglupa" alt="">
                <input type="text" name="" placeholder="Nombre del establecimiento" required>
                <input type="submit" name="" value="Buscar">
            </form>
            <form class="barradebusqueda" id="distrito" method="GET" action="codigophp/distritos.php">
                <img src="imagenes/iconos/lupa.svg" class="imglupa" alt="">
                <select name="distritos" id="distritos" required>
                    <option value="">Selecciona un distrito</option>
                    <?php
                    foreach ($distritos as $distrito) {
                        echo '<option value="' . htmlspecialchars($distrito['id']) . '">' . htmlspecialchars($distrito['nombre']) . '</option>';
                    }
                    ?>
                </select>
                <input type="submit" value="Buscar">
            </form>

            <form class="barradebusqueda" id="carrera">
                <img src="imagenes/iconos/lupa.svg" alt="">
                <select name="carrera" id="carrera" required>
                    <option value="">Elija una carrera</option>
                    <option value="Ingeniería Civil">Ingeniería Civil</option>
                    <option value="Ingeniería de Sistemas">Ingeniería de Sistemas</option>
                    <option value="Ingeniería Mecánica">Ingeniería Mecánica</option>
                    <option value="Licenciatura en Administración de Empresas">Licenciatura en Administración de Empresas</option>
                    <option value="Licenciatura en Psicología">Licenciatura en Psicología</option>
                </select>
                <input type="submit" value="Buscar">
            </form>

            <form class="barradebusqueda" id="tecnicatura">
                <img src="imagenes/iconos/lupa.svg" alt="">
                <select name="tecnicatura" id="tecnicatura" required>
                    <option value="">Elija una tecnicatura</option>
                    <option value="Técnico en Informática">Técnico en Informática</option>
                    <option value="Técnico en Gestión Ambiental">Técnico en Gestión Ambiental</option>
                    <option value="Técnico en Administración de Empresas">Técnico en Administración de Empresas</option>
                    <option value="Técnico en Enfermería">Técnico en Enfermería</option>
                    <option value="Técnico en Mecánica Automotriz">Técnico en Mecánica Automotriz</option>
                </select>
                <input type="submit" value="Buscar">
            </form>

            <div class="universidades">
                <div class="universidad"> 
                    <div class="imagenesuni">
                    <?php
                        echo '<div class="imagen activo" style="background-image: url(' . htmlspecialchars($imagenes[0]['url']) . ')"></div>';
                        echo '<div class="imagen" style="background-image: url(' . htmlspecialchars($imagenes[1]['url']) . ')"></div>';
                        echo '<div class="imagen" style="background-image: url(' . htmlspecialchars($imagenes[2]['url']) . ')"></div>';
                    ?>
                        <div class="circulos">
                            <span class="circulo2 activo"></span>
                            <span class="circulo2"></span>
                            <span class="circulo2"></span>
                        </div>
                    </div>
                    <div class="barrauni"></div>
                    <h1 class="nombreuni">NOMBRE DEL ESTABLECIMIENTO</h1>
                    <p class="descripcionuni">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non maxime in ab vero? Inventore molestiae dignissimos consectetur velit quae culpa dolorum, voluptas blanditiis exercitationem, earum possimus, et recusandae fugiat ad.</p>
                    <a href="./codigophp/universidad.php?universidad=2"  class="botonuni">SABER MAS..</a>
                </div>
                <div class="universidad"> 
                    <div class="imagenesuni">
                    <?php
                        echo '<div class="imagen activo" style="background-image: url(' . htmlspecialchars($imagenes[0]['url']) . ')"></div>';
                        echo '<div class="imagen" style="background-image: url(' . htmlspecialchars($imagenes[1]['url']) . ')"></div>';
                        echo '<div class="imagen" style="background-image: url(' . htmlspecialchars($imagenes[2]['url']) . ')"></div>';
                    ?>
                    <div class="circulos">
                        <span class="circulo activo"></span>
                        <span class="circulo"></span>
                        <span class="circulo"></span>
                    </div>
                    </div>
                    <div class="barrauni"></div>
                    <h1 class="nombreuni">NOMBRE DEL ESTABLECIMIENTO</h1>
                    <p class="descripcionuni">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non maxime in ab vero? Inventore molestiae dignissimos consectetur velit quae culpa dolorum, voluptas blanditiis exercitationem, earum possimus, et recusandae fugiat ad.</p>
                    <a href="./index.php?universidad=2"  class="botonuni">SABER MAS..</a>
                </div>
                <div class="universidad"> 
                    <div class="imagenesuni">
                    <?php
                        echo '<div class="imagen activo" style="background-image: url(' . htmlspecialchars($imagenes[0]['url']) . ')"></div>';
                        echo '<div class="imagen" style="background-image: url(' . htmlspecialchars($imagenes[1]['url']) . ')"></div>';
                        echo '<div class="imagen" style="background-image: url(' . htmlspecialchars($imagenes[2]['url']) . ')"></div>';
                    ?>
                    <div class="circulos">
                        <span class="circulo activo"></span>
                        <span class="circulo"></span>
                        <span class="circulo"></span>
                    </div>
                    </div>
                    <div class="barrauni"></div>
                    <h1 class="nombreuni">NOMBRE DEL ESTABLECIMIENTO</h1>
                    <p class="descripcionuni">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non maxime in ab vero? Inventore molestiae dignissimos consectetur velit quae culpa dolorum, voluptas blanditiis exercitationem, earum possimus, et recusandae fugiat ad.</p>
                    <a href="./index.php?universidad=2"  class="botonuni">SABER MAS..</a>
                </div>
                <div class="universidad"> 
                    <div class="imagenesuni">
                    <?php
                        echo '<div class="imagen activo" style="background-image: url(' . htmlspecialchars($imagenes[0]['url']) . ')"></div>';
                        echo '<div class="imagen" style="background-image: url(' . htmlspecialchars($imagenes[1]['url']) . ')"></div>';
                        echo '<div class="imagen" style="background-image: url(' . htmlspecialchars($imagenes[2]['url']) . ')"></div>';
                    ?>
                    <div class="circulos">
                        <span class="circulo activo"></span>
                        <span class="circulo"></span>
                        <span class="circulo"></span>
                    </div>
                    </div>
                    <div class="barrauni"></div>
                    <h1 class="nombreuni">NOMBRE DEL ESTABLECIMIENTO</h1>
                    <p class="descripcionuni">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non maxime in ab vero? Inventore molestiae dignissimos consectetur velit quae culpa dolorum, voluptas blanditiis exercitationem, earum possimus, et recusandae fugiat ad.</p>
                    <a href="./index.php?universidad=2"  class="botonuni">SABER MAS..</a>
                </div>
                <div class="universidad"> 
                    <div class="imagenesuni">
                    <?php
                        echo '<div class="imagen activo" style="background-image: url(' . htmlspecialchars($imagenes[0]['url']) . ')"></div>';
                        echo '<div class="imagen" style="background-image: url(' . htmlspecialchars($imagenes[1]['url']) . ')"></div>';
                        echo '<div class="imagen" style="background-image: url(' . htmlspecialchars($imagenes[2]['url']) . ')"></div>';
                    ?>
                    <div class="circulos">
                        <span class="circulo activo"></span>
                        <span class="circulo"></span>
                        <span class="circulo"></span>
                    </div>
                    </div>
                    <div class="barrauni"></div>
                    <h1 class="nombreuni">NOMBRE DEL ESTABLECIMIENTO</h1>
                    <p class="descripcionuni">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non maxime in ab vero? Inventore molestiae dignissimos consectetur velit quae culpa dolorum, voluptas blanditiis exercitationem, earum possimus, et recusandae fugiat ad.</p>
                    <a href="./index.php?universidad=2"  class="botonuni">SABER MAS..</a>
                </div>

            </div>
            <div class="barradebusqueda volverarriba">
                <img src="imagenes/iconos/flecha.svg" alt="">
                <button onclick="redirigir('botones')" >Volver arriba</button>
            </div>
        </main>

        <footer class="footer">
            <div class="imagenfooter"></div>
            <div class="logo_pba_vertical2"></div>

            <div class="textofooter">
                <h1>&copy; 2024 Escuela Secundaria Técnica N1 Vicente Lopez. Todos los derechos reservados.</h1>
            </div>
            <div class="redesociales">
                <a href="" class="redsocial" style="background-image: url(https://abc.gob.ar/sites/default/files/2021-03/icon-youtube_0.svg);"></a>
                <a href="" class="redsocial" style="background-image: url(https://abc.gob.ar/sites/default/files/2021-03/icon-instagram_0.svg);"></a>
                <a href="" class="redsocial" style="background-image: url(https://abc.gob.ar/sites/default/files/2021-03/icon-twitter_0.svg);"></a>
                <a href="" class="redsocial" style="background-image: url(https://abc.gob.ar/sites/default/files/2021-03/icon-facebook_0.svg);"></a>
                <a href="" class="redsocial" style="background-image: url(https://abc.gob.ar/sites/default/files/2021-03/icon-flicr_0.svg);"></a>
            </div>
        </footer>
    </div>
</body>
</html>
<script src="./codigojs/carrusel.js"></script>
<script src="./codigojs/redirigir.js"></script>
<script src="./codigojs/botonesbarra.js"></script>
<script src="./codigojs/scroll.js"></script>
<script src="./codigojs/scroll.js"></script>
<?php
    include 'conexion.php';

    $sql = "SELECT id, nombre, email FROM usuarios";
    $result = $conn->query($sql);
?>