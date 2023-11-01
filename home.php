<?php

require_once('conf/conf.php');

$usuario = $_SESSION['usuario'] ?? null;

if(is_null($usuario))
{
    header('Location: logout.php');
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Info </title>
    <?php require('layout/_css.php') ?>
</head>

<body>

    <?php require('layout/_nav_cliente.php') ?>

    <div class="container margin-top-nav-fixed">

        <h1> Hola, <?php echo $usuario['nombre'] ?> </h1>

        <?php if($usuario['rol'] == 'Postulante'): ?>
            <div> Estamos analizando tu perfil. Nos pondremos en contacto con vos a la brevedad. </div>
        <?php else: ?>
            <div> Gracias por trabajar con nosotros </div>
        <?php endif; ?>

    </div>

    <?php require('layout/_js.php') ?>

</body>

</html>