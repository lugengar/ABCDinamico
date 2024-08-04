<!DOCTYPE html>
<html lang="en-es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estiloscss/styles.css">
    <link rel="icon" href="https://abc.gob.ar/core/themes/abc/favicon.ico" type="image/vnd.microsoft.icon">
    <title>Ofertas de Educación Superior Región 6</title>
    <meta name="description" content="Ofertas de Educación Superior Región 6">
</head>
<body>
    <?php
        include "./codigophp/buscar_universidades.php";
    ?>
        <div class="overlay" id="overlay"></div>
    
    <div class="container">
        <main class="carrusel">
            <div class="imagenes">
                <div class="imagen activo" style="background-image: url('imagenes/otros/estudiantes.jpg');"></div>
                <div class="imagen" style="background-image: url('imagenes/otros/gente.jpg');"></div>
                <div class="imagen" style="background-image: url('imagenes/otros/graduados.jpg');"></div>
               
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
        </header>
        
        <main class="main">



            <!-- MAPA -->
            <div id="mapa" popover class="pop2">
                <h1>HAGA CLIC FUERA DEL CUADRO PARA SALIR</h1>
                <iframe src="" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>



            <div class="botones" id="botones">


                <!-- BOTON PARA EL MAPA -->
                <button class="boton pop" >
                    <div class="imagenboton" style="background-image: url(imagenes/iconos/ubicacion.svg);"></div>
                    <h1>Buscar por distrito</h1>
                </button>
                



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
            <form class="barradebusqueda activo" id="nombre" method="GET" action="./index.php#botones">
                <img src="imagenes/iconos/lupa.svg" class="imglupa" alt="">
                <input type="text" name="busqueda" placeholder="Nombre del establecimiento" required>
                <input type="hidden" name="tipo" value="nombre" required>
                <input type="submit" value="Buscar">
            </form>
            <form class="barradebusqueda" id="distrito" method="GET" action="./index.php#botones">
                <img src="imagenes/iconos/lupa.svg" alt="">
                <select name="busqueda"id="" required>
                    <option value="">Elija un distrito</option >
                    <?php
                    //ESCRIBE LAS OPCIONES PARA LA BARRA DE BUSQUEDA
                        buscardistritos();
                    ?>
                </select>
                <input type="hidden" name="tipo" value="distrito" required>
                <input type="submit" name="" value="Buscar" >
            </form>
            <form class="barradebusqueda" id="carrera" method="GET" action="./index.php#botones">
                <img src="imagenes/iconos/lupa.svg" alt="">
                <select name="busqueda" id="" required>
                    <option value="">Elija una carrera</option>
                    <?php
                    //ESCRIBE LAS OPCIONES PARA LA BARRA DE BUSQUEDA
                        buscarcarrera();
                    ?>
                </select>
                <input type="hidden" name="tipo" value="carrera" required>
                <input type="submit" name="" value="Buscar">
            </form>
            <form class="barradebusqueda" id="tecnicatura" method="GET" action="./index.php#botones">
                <img src="imagenes/iconos/lupa.svg" alt="">
                <select name="busqueda" id="" required>
                    <option value="">Elija una tecnicatura</option>
                    <?php
                    //ESCRIBE LAS OPCIONES PARA LA BARRA DE BUSQUEDA
                        buscartecnicatura();
                    ?>
                </select>
                <input type="hidden" name="tipo" value="tecnicatura" required>
                <input type="submit" name="" value="Buscar">
            </form>
            <div class="universidades" id="uni">
               <?php
                    //MUESTRA TODAS LAS UNIVERSIDADES O LOS RESULTADOS DE LAS BUSQUEDAS
                    buscar();
               ?>
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
      
            </div>
        </footer>
    </div>
</body>
</html>
<script src="codigojs/carrusel.js"></script>
<script src="codigojs/redirigir.js"></script>
<script src="codigojs/ventanas.js"></script>
<script src="codigojs/botonesbarra.js"></script>
<script src="codigojs/scroll.js"></script>

