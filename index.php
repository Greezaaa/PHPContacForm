<?php
$errores = '';
$enviado = '';
$page = 'midominio.es';
//where you wanna send email
$destiny = 'testFor@test.com';

if (isset($_POST['submit'])) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];
    $subject = $_POST['subject'];
    $terminos = $_POST['terminos'];
    $noticias = $_POST['noticias'];

 //name check
    if (!empty($nombre)) {
        $nombre = trim($nombre);
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
    } else {
        $errores .= 'Introduzca nombre<br />';
    }
    //mail check if !empty
    if (!empty($correo)) {
        $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);

        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $errores .= 'Introduzca correo valido <br />';
        }
    } else {
        $errores .= 'Introduzca un correo<br />';
    }
   // subject check
    if (!empty($subject)) {
        $subject = trim($subject);
        $subject = filter_var($subject, FILTER_SANITIZE_STRING);
    } else {
        $errores .= 'Introduzca subject<br />';
    }
    // text check
    if (!empty($mensaje)) {
        $mensaje = htmlspecialchars($mensaje);
        $mensaje = trim($mensaje);
        $mensaje = stripslashes($mensaje);
    } else {
        $errores .= 'Introduzca su mensaje<br />';
    }
    // terms check
    if ($terminos == "1") {

        $terminos = "Acceptados";
    } else {
        $errores = 'Depe acceptar terminos y condiciones';
    }
    // news check
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
        $subject = "$subject  mensaje desde formulario de - $page";
        $makingMSG = "<h3>Nombre:  $nombre </h3><br />";
        $makingMSG .= "<b>Correo</b>: $correo <br />";
        $makingMSG .= "<b>Terminos y condiciones:</b>  $terminos <br />";
        $makingMSG .= "<b>Notificaciones y offertas:</b>  $noticias <br /><br />";
        $makingMSG .= "<h4 style='text-decoration: underline; '>Mensaje:</h4><br /> <p style='font-style: italic; max-width: 300px;margin: auto;'> $mensaje</p>";

        mail($enviar_a, $subject, $makingMSG, $headers);
        $enviado = 'true';
    }
}

require 'index.view.php';
