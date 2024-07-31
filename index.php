<!DOCTYPE html>
<html lang="en-es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estiloscss/styles.css">
    <title>Document</title>
</head>
<body>
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
            <a href="formulario.php" class="boton_nose_que_estudiar">No sé que estudiar <div class="circulopregunta" style="background-image: url(imagenes/iconos/pregunta.svg); background-size: 4dvh;"></div></a>
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
            <form class="barradebusqueda" id="distrito" >
                <img src="imagenes/iconos/lupa.svg" alt="">
                <select name="" id="" required>
                    <option value="">Elija un distrito</option >
                    <option value="Tigre">Tigre</option>
                </select>
                <input type="submit" name="" value="Buscar">
            </form>
            <form class="barradebusqueda" id="carrera" >
                <img src="imagenes/iconos/lupa.svg" alt="">
                <select name="" id="" required>
                    <option value="">Elija una carrera</option>
                    <option value="Ingenieria Civil">Ingenieria Civil</option>
                    <option value="Ingenieria de Sistemas">Ingenieria de Sistemas</option>
                    <option value="Ingenieria Mecanica">Ingenieria Mecanica</option>
                    <option value="Licenciatura en Administracion de Empresas">Licenciatura en Administracion de Empresas</option>
                    <option value="Licenciatura en Psicologia">Licenciatura en Psicologia</option>
                </select>
                <input type="submit" name="" value="Buscar">
            </form>
            <form class="barradebusqueda" id="tecnicatura" >
                <img src="imagenes/iconos/lupa.svg" alt="">
                <select name="" id="" required>
                    <option value="">Elija una tecnicatura</option>
                    <option value="Tecnico en Informatica">Tecnico en Informatica</option>
                    <option value="Tecnico en Gestion Ambiental">Tecnico en Gestion Ambiental</option>
                    <option value="Tecnico en Administracion de Empresas">Tecnico en Administracion de Empresas</option>
                    <option value="Tecnico en Enfermeria">Tecnico en Enfermeria</option>
                    <option value="Tecnico en Mecanica Automotriz">Tecnico en Mecanica Automotriz</option>

                </select>
                <input type="submit" name="" value="Buscar">
            </form>
            <div class="universidades">
                <div class="universidad"> 
                    <div class="imagenesuni">
                        <div class="imagenuni activo" style="background-image: url('imagenes/universidades/52.jpg')"></div>
                        <div class="imagenuni" style="background-image: url('imagenes/universidades/140.jpg');"></div>
                        <div class="imagenuni" style="background-image: url('imagenes/universidades/217.jpg');"></div>
                       
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
                        <div class="imagenuni activo" style="background-image: url('imagenes/universidades/117.jpg');"></div>
                        <div class="imagenuni" style="background-image: url('imagenes/universidades/140.jpg');"></div>
                        <div class="imagenuni" style="background-image: url('imagenes/universidades/217.jpg');"></div>
                       
                        <div class="circulos">
                            <span class="circulo2 activo"></span>
                            <span class="circulo2"></span>
                            <span class="circulo2"></span>
                           
                        </div>
                    </div>
                    <div class="barrauni"></div>
                    <h1 class="nombreuni">NOMBRE DEL ESTABLECIMIENTO</h1>
                    <p class="descripcionuni">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non maxime in ab vero? Inventore molestiae dignissimos consectetur velit quae culpa dolorum, voluptas blanditiis exercitationem, earum possimus, et recusandae fugiat ad.</p>
                    <a href="./index.php?universidad=2"  class="botonuni">SABER MAS..</a>
                </div>
                <div class="universidad"> 
                    <div class="imagenesuni">
                        <div class="imagenuni activo" style="background-image: url('imagenes/universidades/220-229.jpg');"></div>
                        <div class="imagenuni" style="background-image: url('imagenes/universidades/140.jpg');"></div>
                        <div class="imagenuni" style="background-image: url('imagenes/universidades/217.jpg');"></div>
                       
                        <div class="circulos">
                            <span class="circulo2 activo"></span>
                            <span class="circulo2"></span>
                            <span class="circulo2"></span>
                           
                        </div>
                    </div>
                    <div class="barrauni"></div>
                    <h1 class="nombreuni">NOMBRE DEL ESTABLECIMIENTO</h1>
                    <p class="descripcionuni">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non maxime in ab vero? Inventore molestiae dignissimos consectetur velit quae culpa dolorum, voluptas blanditiis exercitationem, earum possimus, et recusandae fugiat ad.</p>
                    <a href="./index.php?universidad=2"  class="botonuni">SABER MAS..</a>
                </div>
                <div class="universidad"> 
                    <div class="imagenesuni">
                        <div class="imagenuni activo" style="background-image: url('imagenes/universidades/77.jpg');"></div>
                        <div class="imagenuni" style="background-image: url('imagenes/universidades/140.jpg');"></div>
                        <div class="imagenuni" style="background-image: url('imagenes/universidades/217.jpg');"></div>
                       
                        <div class="circulos">
                            <span class="circulo2 activo"></span>
                            <span class="circulo2"></span>
                            <span class="circulo2"></span>
                           
                        </div>
                    </div>
                    <div class="barrauni"></div>
                    <h1 class="nombreuni">NOMBRE DEL ESTABLECIMIENTO</h1>
                    <p class="descripcionuni">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non maxime in ab vero? Inventore molestiae dignissimos consectetur velit quae culpa dolorum, voluptas blanditiis exercitationem, earum possimus, et recusandae fugiat ad.</p>
                    <a href="./index.php?universidad=2"  class="botonuni">SABER MAS..</a>
                </div>
                <div class="universidad"> 
                    <div class="imagenesuni">
                        <div class="imagenuni activo" style="background-image: url('imagenes/universidades/199.jpg');"></div>
                        <div class="imagenuni" style="background-image: url('imagenes/universidades/140.jpg');"></div>
                        <div class="imagenuni" style="background-image: url('imagenes/universidades/217.jpg');"></div>
                       
                        <div class="circulos">
                            <span class="circulo2 activo"></span>
                            <span class="circulo2"></span>
                            <span class="circulo2"></span>
                           
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
<script src="codigojs/carrusel.js"></script>
<script src="codigojs/redirigir.js"></script>
<script src="codigojs/botonesbarra.js"></script>
<script src="codigojs/scroll.js"></script>

