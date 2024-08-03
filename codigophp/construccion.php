<?php

//ESTE ARCHIVO SE ENCARGA DE CONSTRUIR EL DISEÑO RECIBIENDO LOS DATOS DE LA BDD

//DIRECCIONES DE DONDE TOMAR LAS IMAGENES Y PDF
$direccionimagen = "https://lugengar.github.io/ABC/imagenes/universidades/"; // ../imagenes/universidades/
$direccionpdf = "https://lugengar.github.io/ABC/pdf/";// ../pdf

function universidad($id,$nombre ,$descripcion, $imagenes){ //CREA EL CUADRO DE UNIVERSIDAD
    global $direccionimagen;
    echo '<div class="universidad">';
    if($imagenes->num_rows > 0){
        echo '<div class="imagenesuni">';
        foreach($imagenes as $key => $imagen) {
            echo '<div class="imagenuni activo" style="background-image: url('.$direccionimagen."".$imagen["url"].');"></div>';
        }
        if($imagenes->num_rows > 1){
            echo '<div class="circulos">';
            foreach($imagenes as $key => $imagen) {
                if($key == 0){
                    echo '<span class="circulo2 activo"></span>';
                }else{
                    echo '<span class="circulo2"></span>';
                }
            }
            echo'</div></div><div class="barrauni"></div>';
        }else{
            echo '</div> <div class="barrauni"></div>';
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
function crearmapa($ubicacion){ //CREA EL MAPA CON LA UBICACION A TRAVEZ DE UNA URL MODIFICADA
    $url = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3287.4006114986105!2d-58.53745522416194!3d-34.51807695298058!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb0946037da75%3A0x7fae4b92e6699b59!2s";
    $url2 = "!5e0!3m2!1ses-419!2sar!4v1684382444792!5m2!1ses-419!2sar";
    return $url."".urlencode($ubicacion)."".$url2;
}
function nombre_url($url){ //OBTIENE EL NOMBRE DE UNA RED SOCIAL A TRAVEZ DE SU URL
    $parsed_url = parse_url($url);

    $path = trim($parsed_url['path'], '/');

    $account_name = basename($path);
    return $account_name;
}
function generarTextoRedesSociales($contactos) { //CREA UN TEXTO COOHERENTE DONDE SE MUESTRAN TODAS LAS REDES SOCIALES DE LA UNIVERSIDAD
    global $sinocontacto;

    $texto = "Contamos con ";

    $nombresRedes = [
        "youtube" => "un canal de YouTube: ",
        "instagram" => "Instagram: ",
        "whatsapp" => "Whatsapp: ",
        "tiktok" => "TikTok: ",
        "facebook" => "Facebook: ",
        "twitter" => "Twitter: ",
        "correo" => "correo electrónico: ",
        "telefono" => "numero de teléfono: ",
    ];

    $redesDisponibles = [];
    foreach ($contactos as $contacto) {
        if (isset($nombresRedes[$contacto["tipo"]])) {
            if($nombresRedes[$contacto["tipo"]] == "correo"){
                $sinocontacto = true;
                $redesDisponibles[] = $nombresRedes[$contacto["tipo"]].'<a href="mailto:'.$contacto["contacto"].' target="_blank">' .$contacto["contacto"]. '</a>';

            }else if($nombresRedes[$contacto["tipo"]] == "telefono"){
                $redesDisponibles[] = $nombresRedes[$contacto["tipo"]].'<a href="tel:'.arreglar_telefono($contacto["contacto"]).' target="_blank">' .arreglar_telefono($contacto["contacto"]) . '</a>';
            }else{
                $redesDisponibles[] = $nombresRedes[$contacto["tipo"]].'<a href="'.$contacto["contacto"].' target="_blank">' .nombre_url($contacto["contacto"]) . '</a>';
            }
        }
    }
    $cantidad = count($redesDisponibles);

    if ($cantidad == 1) {
        $texto .= $redesDisponibles[0] . ".";
    } elseif ($cantidad == 2) {
        $texto .= $redesDisponibles[0] . " y " . $redesDisponibles[1] . ".";
    } elseif ($cantidad > 2) {
        $texto .= implode(", ", array_slice($redesDisponibles, 0, -1)) . " y " . end($redesDisponibles) . ".";
    }

    return $texto;
}

function carreraslista($carreras){ // CREA LA LISTA DE CARRERAS Y TECNICATURAS PARA LA BARRA DE BUSQUEDA
    foreach ($carreras as $carrera) {
        echo '<option value="'.$carrera["id_carrera"].'">'.$carrera["nombre"].'</option>';
    }
}
function distritolista($distritos){ // CREA LA LISTA DE LOS DISTRITOS PARA LA BARRA DE BUSQUEDA
    foreach ($distritos as $distrito) {
        echo '<option value="'.$distrito["id_distrito"].'">'.$distrito["nombre"].'</option>';
    }
}
function arreglar_telefono($tel){ // MODIFICA EL NUMERO DE TELEFONO EN CASO DE FALTAR EL +54 O EL 11
    $contidad = strlen($tel);
    if($contidad != 9 || $contidad != 8){
        $tel = "+54 11 ".$tel;
    }else if($contidad != 12 || $contidad != 11){
        $tel = "+54 ".$tel;
    }
    return $tel;
}



function arreglar_url($url){ // MODIFICA LAS URL PARA QUE FUNCIONEN CORRECTAMENTE
    if($url[0] != "h" && $url[1] != "t"){
        $posicionSlash = strpos($url, '/');
        if ($posicionSlash != false) {
            $parteAntesDelSlash = substr($url, 0, $posicionSlash);
            $parteDespuesDelSlash = substr($url, $posicionSlash);
            $url = $parteAntesDelSlash . ".com" . $parteDespuesDelSlash;
        } else {
            $url = $url . ".com";
        }
        $url = "https://www.".$url;
    }
    return $url;

}
function arreglarpdf($url){ //MODIFICA EL NOMBRE DEL ARCHIVO PDF EN CASO DE QUE ALGO NO ESTE BIEN
    global $direccionpdf;
    if($url[0] != "h" && $url[1] != "t"){
       $url = $direccionpdf . $url;
    }
    if($url[strlen($url)-1] != "f"){
        $url = $url . ".pdf";
    }
    if($url[strlen($url)-1] == "."){
        $url = $url . "pdf";
    }
    return $url;
}

$sinocontacto = true;
function info_universidad($info,$ubicacion,$servicios,$distrito,$nombre,$contactos){ // MUESTRA TODA LA INFORMACION DE LA UNIVERSIDAD
    global $sinocontacto;
    
    $textocontacto = generarTextoRedesSociales($contactos);
    $todoslosservicios = ['<p class="redsocial2" style="background-image: url(imagenes/iconos/silladeruedas.svg);">Accesibilidad para sillas de ruedas.</p>',
    '<p class="redsocial2" style="background-image: url(imagenes/iconos/calefaccion.svg);">Cuenta con calefacción</p>',
    '<p class="redsocial2" style="background-image: url(imagenes/iconos/wifi.svg);">Cuenta con WIFI</p>',
    '<p class="redsocial2" style="background-image: url(imagenes/iconos/comedor.svg);">Cuenta con comedor</p>'];
    if($sinocontacto == true){
        echo '<div class="informacion lista3" style="padding-top: 5dvh;">';

    }else{
        echo '<div class="informacion lista4" style="padding-top: 5dvh;">';
    }
        echo ('
    
        <div class="universidad horizontal" id="info">  
            <div class="imageninfo2" style="background-image: url(imagenes/iconos/informacion.svg);"></div>
            <div class="barrauni3"></div>
            <div class="lista5" style="gap: 0vh;">
            <h1 class="nombreuni">¿PORQUE ELEGIRNOS?</h1>
            <p class="descripcionuni">'.$info.'</p>
            
            <div class="redesociales">');
            if($servicios != "0000"){
                for ($i=0; $i < 3; $i++) { 
                    if($servicios[$i] == "1"){
                        echo $todoslosservicios[$i];
                    }
                }
            }
    echo'</div> </div> </div> ';
        echo ('
        <div class="universidad" id="mapa"> 
            <iframe  class="imageninfo"  src="'.crearmapa($ubicacion.', '.$distrito).'" style="border:none;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="barrauni"></div>
            <h1 class="nombreuni">UBICACIÓN</h1>
            <p class="descripcionuni">'.$ubicacion.', '.$distrito.'</p>
            <button class="botonuni pop" popovertarget="googlemaps">ABRIR MAPA</button>
        </div>
            
        <div id="googlemaps" popover class="pop2">
            <h1>HAGA CLIC FUERA DEL CUADRO PARA SALIR</h1>
            <iframe src="'.crearmapa($ubicacion.', '.$distrito).'" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="universidad horizontal" id="redes"> 
           <div class="imageninfo2" style="background-image: url(imagenes/iconos/correo.svg);"></div>
            <div class="barrauni3"></div>
            <div class="lista5" style="gap: 0vh;">
            <h1 class="nombreuni">CONTACTO Y REDES SOCIALES</h1>');
            $inscripcion = null;
            
       
            if($contactos->num_rows > 0){
                /*
                foreach($contactos as $key => $contacto) {
                    if($contacto["tipo"] == "correo"){
                        $inscripcion = $contacto["contacto"];
                        echo '<p class="descripcionuni" style="margin-bottom:0vh;">'.$contacto["tipo"].': <a href="mailto:inscripcion@'.$contacto["contacto"].'">'.$contacto["contacto"].'</a></p>';
                        $sinocontacto = true;
                    }else if($contacto["tipo"] == "telefono"){
                        
                        echo '<p class="descripcionuni" style="margin-bottom:0vh;">'.$contacto["tipo"].': <a href="tel:'.arreglar_telefono($contacto["contacto"]).'">'.arreglar_telefono($contacto["contacto"]).'</a></p>';
                    }else{
                        echo '<p class="descripcionuni" style="margin-bottom:0vh;">'.$contacto["tipo"].': <a href="'.arreglar_url($contacto["contacto"]).'">'.arreglar_url($contacto["contacto"]).'</a></p>';
                    }
                }*/
                echo ' <p class="descripcionuni">'.$textocontacto.'</p>';
                echo '<p class="descripcionuni"></p><div class="redesociales">';
                foreach($contactos as $key => $contacto) {
                    if($contacto["tipo"] == "correo"){
                        echo '<a class="redsocial2 " style="background-image: url(imagenes/iconos/'.$contacto["tipo"].'.svg);" href="mailto:inscripcion@'.$contacto["contacto"].'" >Enviar correo</a>';
                    }else if($contacto["tipo"] == "telefono"){
                        echo '<a class="redsocial2 " style="background-image: url(imagenes/iconos/'.$contacto["tipo"].'.svg);" href="tel:'.arreglar_telefono($contacto["contacto"]).'" >Llamar por telefono</a>';
                    }else{
                        echo '<a class="redsocial " style="background-image: url(imagenes/iconos/'.$contacto["tipo"].'.svg);" href="'.arreglar_url($contacto["contacto"]).'" ></a>';
                    }
                }
                echo'</div>';
            }else{
                echo '<p class="descripcionuni" >Ningun contacto disponible</p>';
            }
            echo'</div> </div>';
            if($sinocontacto == true){// EN CASO DE NO CONTAR CON UN CONTACTO NO MOSTRARA LA INSCRIPCION
                echo ('
                <form class="universidad " id="formulariodecontacto"> 
                    <div class="imageninfo"style="background-image: url(imagenes/iconos/inscripcion.svg);"></div>
                    <div class="barrauni"></div>
                    <h1 class="nombreuni">CONSULTAR INSCRIPCIÓN</h1>
                    <input type="hidden" id="name" name="name" required placeholder="Nombre">
                    <input type="hidden" id="receptor" name="receptor" value="'.$inscripcion.'" required>
                    <input type="hidden" id="email" name="email" required placeholder="Correo">
                    <textarea id="message" name="message" required placeholder="Mensaje">Hola. Me gustaría obtener información sobre el proceso de inscripción. Muchas gracias.</textarea>
                    <button class="botonuni" type="submit">Enviar</button>
                </form> 
                ');
            }
            echo'</div>';   

}
function carrusel($nombre,$ubicacion,$imagenes){ // CREA EL CARRUSEL DE IMAGENES
    global $direccionimagen;
    if($imagenes->num_rows > 0){
        echo '<div class="imagenes">';
        foreach($imagenes as $key => $imagen) {
            echo '<div class="imagen activo" style="background-image: url('.$direccionimagen."".$imagen["url"].');"></div>';
        }

        echo '</div>
        <div class="filtro">
        <div class="contenidotexto">
                <h1 class="texto1">'.$nombre.'</h1>
        </div>
        <div class="contenidotexto">
            <h1 class="texto2">'.$ubicacion.'</h1>
        </div>';
        if($imagenes->num_rows > 1){
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
        echo'<h1 class="error imagenuni">NO HAY IMAGENES</h1>
        <div class="filtro">
        <div class="contenidotexto">
                <h1 class="texto1">'.$nombre.'</h1>
        </div>
        <div class="contenidotexto">
            <h1 class="texto2">'.$ubicacion.'</h1>
        </div>';
        
    }
    echo'<a href="index.php" class="logo_pba_vertical"></a>';
}
function carrera($id,$nombre,$descripcion, $id_establecimiento){ //CREA EL CUADRO DE LAS CARRERAS
    echo ('
        <form class="universidad" method="GET" action="./universidad.php#plan">
            <h1 class="nombreuni">'.$nombre.'</h1>
            <p class="descripcionuni">'.$descripcion.'</p>
            <input type="submit" value="SABER MAS.." class="botonuni"></button>
            <input type="hidden" name="universidad" value="'.$id_establecimiento.'" required>
            <input type="hidden" name="carrera" value="'.$id.'" required>
        </form>
    ');
}
function info_carrera($titulo,$descripcion, $pdf, $carrera){ //MUESTRA EL PLAN DE ESTUDIO Y LA INFO DE LA CARRERA
    echo ('
        <div class="barraseparadora" ></div>
        <div class="universidad"> 
            <div class="imageninfo" style="background-image: url(imagenes/iconos/diploma.svg);"></div>
            <div class="barrauni"></div>
            <h1 class="nombreuni">'.$titulo.'</h1>
            <p class="descripcionuni">'.$descripcion.'</p>
        </div>
       
        <div class="universidad"> 
            <div class="imageninfo"style="background-image: url(imagenes/iconos/recurso.svg);"></div>
            <div class="barrauni"></div>
            <h1 class="nombreuni">MODALIDAD DE CURSADA</h1>
            <p class="descripcionuni">A continuación, se presenta el plan de estudios detallado que guía el desarrollo académico y profesional de los estudiantes en nuestra institución. Este plan abarca una variedad de cursos fundamentales y avanzados diseñados para proporcionar una formación integral y especializada en el campo elegido.</p>
            <button class="botonuni pop" popovertarget="pdf-container">VER RECURSO</button>
        </div>
          <div id="pdf-container" popover  class="pop2">
            <h1>HAGA CLIC FUERA DEL CUADRO PARA SALIR</h1>
            <embed class="pdf-viewer" src="'.arreglarpdf($pdf).'" type="application/pdf" />
        </div>
    ');
    global $sinocontacto;

    if($sinocontacto == true){ // EN CASO DE NO CONTAR CON UN CONTACTO NO MOSTRARA LA INSCRIPCION
       
         echo ('
        <div class="universidad"> 
            <div class="imageninfo"style="background-image: url(imagenes/iconos/inscripcion.svg);"></div>
            <div class="barrauni"></div>
            <h1 class="nombreuni">CONSULTAR INSCRIPCIÓN</h1>
            <p class="descripcionuni">El siguiente botón nos enviará a un formulario donde podremos consultar la inscripción a travez del correo oficial del establecimiento.</p>
            <a class="botonuni" href="#formulariodecontacto">INSCRIBIRME</a>
        </div>   
    ');
    }
}
?>

