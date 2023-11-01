<?php

require_once('conf/conf.php');

require_once('_conexion.php');
require_once('funciones/funciones_input.php');
require_once('consultas/consultas_usuarios.php');

$nombre = test_input($_POST['nombre'] ?? null);
$email = test_input($_POST['email'] ?? null);
$contrasena = test_input($_POST['contrasena'] ?? null);
$archivo = $_FILES['archivo'] ?? null;

$errores = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{

    $errores = validarUsuario([
        'nombre' => $nombre,
        'email' => $email,
        'contrasena' => $contrasena,
        'archivo' => $archivo,
    ]);

    if( getUsuarioByEmail($conexion, $email) ){
        $errores[] = "Ya existe un usuario con el email {$email}";
    }

    //Verifica que el formulario esté validado
    if( count($errores) == 0 )
    {

        $archivo_desde = $archivo['tmp_name'];
        $archivo_hacia = 'cvs/' . time() . $archivo['name'];
        $archivo_hacia = str_replace(' ', '_', $archivo_hacia);
        move_uploaded_file($archivo_desde, $archivo_hacia);

        $usuario_nuevo = [
            'nombre' => $nombre,
            'email' => $email,
            'contrasena' => $contrasena,
            'archivo' => $archivo_hacia,
            'rol' => 'Postulante'
        ];

        addUsuario($conexion, $usuario_nuevo);

        header('Location: solicitud-procesada.php');

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
        <h1 class="text text-center"> Registro </h1>

        <ul>
            <?php foreach($errores as $error): ?>
                <li class="text text-danger"> <?php echo $error ?> </li>
            <?php endforeach ?>
        </ul>

        <form action="<?php echo BASE_URL ?>registro.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombre" class="form-label"> Nombre </label>
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese su nombre" value="<?php echo $nombre ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label"> Email </label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Ingrese su correo electrónico" value="<?php echo $email ?>">
            </div>
            <div class="mb-3">
                <label for="contrasena" class="form-label"> Contraseña </label>
                <input type="password" name="contrasena" id="contrasena" class="form-control">
            </div>
            <div class="mb-3">
                <label for="archivo" class="form-label"> CV </label>
                <input type="file" name="archivo" id="archivo" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary"> Postularse </button>
        </form>

    </div>

    <?php require('layout/_js.php') ?>

</body>

</html>