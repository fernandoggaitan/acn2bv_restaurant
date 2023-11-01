<?php

require_once('conf/conf.php');
require_once('_conexion.php');
require_once('funciones/funciones_input.php');
require_once('consultas/consultas_usuarios.php');

$error = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{

    $email = test_input( $_POST['email'] ?? null );
    $contrasena = test_input( $_POST['contrasena'] ?? null );

    $usuario = getUsuarioByEmail($conexion, $email);

    if($usuario and $usuario['contrasena'] == $contrasena){

        $_SESSION['usuario'] = [
            'id' => $usuario['id'],
            'nombre' => $usuario['nombre'],
            'rol' => $usuario['rol'],
        ];

        header('Location: home.php');

    }else{
        $error = 'Los datos ingresados son incorrectos.';
    }

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
        <h1 class="text text-center"> Login </h1>

        <?php if($error): ?>
            <div class="alert alert-danger"> <?php echo $error ?> </div>
        <?php endif ?>

        <form action="<?php echo BASE_URL ?>login.php" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="contrasena" class="col-sm-2 col-form-label">Contraseña</label>
                <input type="password" class="form-control" name="contrasena" id="contrasena">
            </div>
            <button type="submit" class="btn btn-primary"> Enviar </button>
            <a href="<?php echo BASE_URL ?>registro.php" class="text text-primary"> Quiero postularme </a>
        </form>

    </div>

    <?php require('layout/_js.php') ?>

</body>

</html>