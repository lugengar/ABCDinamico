<?php


function universidad($id,$nombre ,$descripcion, $imagenes){
    echo '<div class="universidad">';
    if(count($imagenes) > 0){
        echo '<div class="imagenesuni">';
        foreach($imagenes as $key => $imagen) {
            echo '<div class="imagenuni activo" style="background-image: url('.$imagen["url"].')"></div>';
        }
        if(count($imagenes) > 1){
            echo '<div class="circulos">';
            foreach($imagenes as $key => $imagen) {
                if($key == 0){
                    echo '<span class="circulo2 activo"></span>';
                }else{
                    echo '<span class="circulo2"></span>';
                }
            }
            echo'</div></div><div class="barrauni"></div>';
        }
    }else{
        echo'<h1 class="nombreuni">NO HAY IMAGENES</h1>';
    }
    echo('
        <h1 class="nombreuni">'.$nombre.'</h1>
        <p class="descripcionuni">'.$descripcion.'</p>
        <a href="./universidad.php?universidad='.$id.'"  class="botonuni">SABER MAS..</a>
    </div>
    ');
}

function info_universidad(){
    echo ('
        <div class="informacion lista" style="padding-top: 5vh;">
            <div class="universidad " id="info">  
                <div class="imageninfo" style="background-image: url(imagenes/iconos/informacion.svg);"></div>
                <div class="barrauni"></div>
                <h1 class="nombreuni">INFORMACIÓN</h1>
                <p class="descripcionuni">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non maxime in ab vero? Inventore molestiae dignissimos consectetur velit quae culpa dolorum, voluptas blanditiis exercitationem, earum possimus, et recusandae fugiat ad.</p>
                <div class="redesociales">
                    <p class="redsocial2" style="background-image: url(imagenes/iconos/silladeruedas.svg);">Cuenta con rampas</p>
                    <p class="redsocial2" style="background-image: url(imagenes/iconos/calefaccion.svg);">Cuenta con calefacción</p>
                    <p class="redsocial2" style="background-image: url(imagenes/iconos/wifi.svg);">Cuenta con WIFI</p>
                    <p class="redsocial2" style="background-image: url(imagenes/iconos/comedor.svg);">Cuenta con comedor</p>
                </div>
            </div>
            
            <div class="universidad" id="mapa"> 
                <iframe  class="imageninfo" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13150.23923620172!2d-58.542955899999995!3d-34.51404235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb08d0e03c427%3A0xb9671110c4893ecd!2sEasy!5e0!3m2!1ses-419!2sar!4v1719099532427!5m2!1ses-419!2sar" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="barrauni"></div>
                <h1 class="nombreuni">UBICACIÓN</h1>
                <p class="descripcionuni">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non maxime in ab vero? Inventore molestiae dignissimos consectetur velit quae culpa dolorum, voluptas blanditiis exercitationem, earum possimus, et recusandae fugiat ad.</p>
                <button class="botonuni pop" popovertarget="googlemaps">ABRIR MAPA</button>
            </div>
            <div class="universidad "> 
                <div class="imageninfo"style="background-image: url(imagenes/iconos/correo.svg);"></div>

                <div class="barrauni"></div>
                <h1 class="nombreuni">CONTACTO Y REDES SOCIALES</h1>
                
                <p class="descripcionuni">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non maxime in ab vero? Inventore molestiae dignissimos consectetur velit quae culpa dolorum, voluptas blanditiis exercitationem, earum possimus, et recusandae fugiat ad.</p>
                <div class="redesociales">
                    <a class="redsocial2 " style="background-image: url(imagenes/iconos/correo.svg);" href="mailto:inscripcion@tecnica1vl.org" >Enviar correo</a>

                    <a href="" class="redsocial" style="background-image: url(https://abc.gob.ar/sites/default/files/2021-03/icon-youtube_0.svg);"></a>
                    <a href="" class="redsocial" style="background-image: url(https://abc.gob.ar/sites/default/files/2021-03/icon-instagram_0.svg);"></a>
                    <a href="" class="redsocial" style="background-image: url(https://abc.gob.ar/sites/default/files/2021-03/icon-twitter_0.svg);"></a>
                    <a href="" class="redsocial" style="background-image: url(https://abc.gob.ar/sites/default/files/2021-03/icon-facebook_0.svg);"></a>
                
                </div>
            </div> 
            <form class="universidad " id="formulariodecontacto"> 
                <div class="imageninfo"style="background-image: url(imagenes/iconos/inscripcion.svg);"></div>
                <div class="barrauni"></div>
                <h1 class="nombreuni">CONSULTAR INSCRIPCIÓN</h1>
                <input type="text" id="name" name="name" required placeholder="Nombre">
                <input type="email" id="email" name="email" required placeholder="Correo">
                <textarea id="message" name="message" required placeholder="Mensaje">Hola. Me gustaría obtener información sobre el proceso de inscripción. Muchas gracias.</textarea>
                <button class="botonuni" type="submit">Enviar</button>
            </form> 
        </div>
           
    ');
}
function carrusel($nombre,$ubicacion,$imagenes){
    
    if(count($imagenes) > 0){
        echo '<div class="imagenes">';
        foreach($imagenes as $key => $imagen) {
            echo '<div class="imagenuni activo" style="background-image: url('.$imagen["url"].')"></div>';
        }

        echo '</div>
        <div class="filtro">
        <div class="contenidotexto">
                <h1 class="texto1">'.$nombre.'</h1>
        </div>
        <div class="contenidotexto">
            <h1 class="texto2">'.$ubicacion.'</h1>
        </div>';
        if(count($imagenes) > 1){
            echo '<div class="circulos">';
            foreach($imagenes as $key => $imagen) {
                if($key == 0){
                    echo '<span class="circulo activo"></span>';
                }else{
                    echo '<span class="circulo"></span>';
                }
            }
            echo'</div>';
        }
    }else{
        echo'<h1 class="error imagenuni">NO HAY IMAGENES</h1>';
    }
    echo'<a href="index.php" class="logo_pba_vertical"></a>';
}
function carrera(){
    echo ('
        <div class="universidad"> 
            <div class="imagenesuni"></div>
            <div class="barrauni"></div>
            <h1 class="nombreuni">NOMBRE DE LA CARRERA</h1>
            <p class="descripcionuni">Descripción: Lorem ipsum dolor sit amet consectetur adipisicing elit. Non maxime in ab vero? Inventore molestiae dignissimos consectetur velit quae culpa dolorum, voluptas blanditiis exercitationem, earum possimus, et recusandae fugiat ad.</p>
            <button class="botonuni">SABER MAS..</button>
        </div>
        <div class="universidad"> 
            <div class="imagenesuni"></div>
            <div class="barrauni"></div>
            <h1 class="nombreuni">NOMBRE DE LA TECNICATURA</h1>
            <p class="descripcionuni">Descripción: Lorem ipsum dolor sit amet consectetur adipisicing elit. Non maxime in ab vero? Inventore molestiae dignissimos consectetur velit quae culpa dolorum, voluptas blanditiis exercitationem, earum possimus, et recusandae fugiat ad.</p>
            <button class="botonuni">SABER MAS..</button>
        </div>
    ');
}
function info_carrera(){
    echo ('
            <div class="barraseparadora" ></div>
            <div class="universidad"> 
                <div class="imagenesuni" ></div>
                <div class="barrauni"></div>
                <h1 class="nombreuni">NOMBRE DE LA CARRERA</h1>
                <p class="descripcionuni">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non maxime in ab vero? Inventore molestiae dignissimos consectetur velit quae culpa dolorum, voluptas blanditiis exercitationem, earum possimus, et recusandae fugiat ad.</p>
            </div>
            <div class="universidad"> 
                <div class="imageninfo" style="background-image: url(imagenes/iconos/diploma.svg);"></div>
                <div class="barrauni"></div>
                <h1 class="nombreuni">TITULO FINAL</h1>
                <p class="descripcionuni">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non maxime in ab vero? Inventore molestiae dignissimos consectetur velit quae culpa dolorum, voluptas blanditiis exercitationem, earum possimus, et recusandae fugiat ad.</p>
            </div>
            <div class="universidad"> 
                <div class="imageninfo"style="background-image: url(imagenes/iconos/laboral.svg);"></div>
                <div class="barrauni"></div>
                <h1 class="nombreuni">ÁREA DE INSERCIÓN</h1>
                <p class="descripcionuni">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non maxime in ab vero? Inventore molestiae dignissimos consectetur velit quae culpa dolorum, voluptas blanditiis exercitationem, earum possimus, et recusandae fugiat ad.</p>
            </div> 
            <div class="universidad"> 
                <div class="imageninfo"style="background-image: url(imagenes/iconos/recurso.svg);"></div>
                <div class="barrauni"></div>
                <h1 class="nombreuni">MODALIDAD DE CURSADA</h1>
                <p class="descripcionuni">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non maxime in ab vero? Inventore molestiae dignissimos consectetur velit quae culpa dolorum, voluptas blanditiis exercitationem, earum possimus, et recusandae fugiat ad.</p>
                <button class="botonuni pop" popovertarget="pdf-container">VER RECURSO</button>
            </div> 
            
            <div class="universidad"> 
                <div class="imageninfo"style="background-image: url(imagenes/iconos/inscripcion.svg);"></div>
                <div class="barrauni"></div>
                <h1 class="nombreuni" style="padding-bottom: 5vh;">CONSULTAR INSCRIPCIÓN</h1>
                <a class="botonuni" href="#formulariodecontacto">INSCRIBIRME</a>
            </div>   
    ');
}
?>

