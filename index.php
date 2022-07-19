<?php
$errores = '';
$enviado = '';
$page = 'midominio.es';
$destiny = 'info@yellowcoffeecup.com';

if (isset($_POST['submit'])) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];
    $asunto = $_POST['asunto'];
    $terminos = $_POST['terminos'];
    $noticias = $_POST['noticias'];

    //Comprobacion del nombre
    if (!empty($nombre)) {
        $nombre = trim($nombre);
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
    } else {
        $errores .= 'Introduzca nombre<br />';
    }
    //comprobacion del correo
    if (!empty($correo)) {
        $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);

        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $errores .= 'Introduzca correo valido <br />';
        }
    } else {
        $errores .= 'Introduzca un correo<br />';
    }
    //Comprobacion del asunto
    if (!empty($asunto)) {
        $asunto = trim($asunto);
        $asunto = filter_var($asunto, FILTER_SANITIZE_STRING);
    } else {
        $errores .= 'Introduzca asunto<br />';
    }
    //comprobacion del mensaje
    if (!empty($mensaje)) {
        $mensaje = htmlspecialchars($mensaje);
        $mensaje = trim($mensaje);
        $mensaje = stripslashes($mensaje);
    } else {
        $errores .= 'Introduzca su mensaje<br />';
    }
    //Comprobacion del terminos
    if ($terminos == "1") {

        $terminos = "Acceptados";
    } else {
        $errores = 'Depe acceptar terminos y condiciones';
    }
    //Comprobacion del noticias
    if ($noticias == "1") {

        $noticias = "Acceptado";
    } else {
        $noticias = "$nombre No quire recibir correo con  noticias y offertas";
    }

    if (!$errores) {
        $headers = "MIME-Version: 1.0" . "\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\n";
        $headers .= "From:$correo";
        $enviar_a = $destiny;
        $asunto = "$asunt  mensaje desde formulario de - $page";
        $mensaje_preparado = "<h3>Nombre:  $nombre </h3><br />";
        $mensaje_preparado .= "<b>Correo</b>: $correo <br />";
        $mensaje_preparado .= "<b>Terminos y condiciones:</b>  $terminos <br />";
        $mensaje_preparado .= "<b>Notificaciones y offertas:</b>  $noticias <br /><br />";
        $mensaje_preparado .= "<h4 style='text-decoration: underline; '>Mensaje:</h4><br /> <p style='font-style: italic; max-width: 300px;margin: auto;'> $mensaje</p>";

        mail($enviar_a, $asunto, $mensaje_preparado, $headers);
        $enviado = 'true';
    }
}

require 'index.view.php';
