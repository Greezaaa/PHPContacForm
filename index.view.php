<!DOCTYPE html>
<html lang="ES">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de contacto</title>
    <link rel="stylesheet" href="./css/form-style.min.css">
</head>

<body>
    <div class="form-wrapper">
        <form action=" <?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="input-content">
                <input type="text" class="input" id="nombre" name="nombre" value="<?php if (!$enviado && isset($nombre)) echo $nombre; ?>" placeholder="Nombre">
                <label for="nombre">Nombre</label>
            </div>
            <div class="input-content">
                <input type="text" class="input" id="correo" name="correo" value="<?php if (!$enviado && isset($correo)) echo $correo; ?>" placeholder="Correo">
                <label for="correo">Correo</label>
            </div>
            <div class="input-content">
                <input type="text" class="input" id="subject" name="subject" value="<?php if (!$enviado && isset($subject)) echo $subject; ?>" placeholder="subject">
                <label for="subject">Asunto</label>
            </div>

            <div class="input-content">
                <textarea rows="7 " id="mensaje" name="mensaje" class="input" placeholder="Mensaje"><?php if (!$enviado && isset($mensaje)) echo $mensaje; ?></textarea>
                <label for="message"> Mensaje </label>
            </div>
            <div class="input-content">
                <input type="hidden" id="" name="terminos" value="0">
                <input type="checkbox" name="terminos" id="terminos" value="1">
                <label for="terminos">Acepto terminos y condiciones</label>

            </div>
            <div class="input-content">
                <input type="hidden" id="" name="noticias" value="0">
                <input type="checkbox" name="noticias" id="noticias" value="1">
                <label for="noticias">Quiero recibir noticias y promociones de <span><?php echo $page; ?></span></label>

            </div>
            <?php if (!empty($errores)) : ?>
                <div class="alert error">
                    <?php echo $errores ?>
                </div>
            <?php elseif ($enviado) : ?>
                <div class="alert success">
                    Mensaje enviado
                </div>
            <?php endif ?>
            <input type="submit" name="submit" class="btn btn-enviar" value="Enviar correo">
        </form>
    </div>
</body>

</html>