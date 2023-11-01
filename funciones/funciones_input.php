<?php

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function validarProducto($producto)
{

    $errores = [];

    if( empty($producto['nombre']) ){
        $errores[] = 'Usted debe ingresar un nombre';
    }

    if( !is_numeric($producto['precio']) ){
        $errores[] = 'Usted debe ingresar un precio';
    }

    if( !is_numeric($producto['descuento']) ){
        $errores[] = 'Usted debe ingresar un descuento';
    }

    if( empty($producto['categoria']) ){
        $errores[] = 'Usted debe ingresar una categoría';
    }

    if( empty($producto['descripcion']) ){
        $errores[] = 'Usted debe ingresar una descripción';
    }

    return $errores;

}

function validarUsuario($usuario)
{

    $errores = [];

    //Valida el nombre del postulante.
    if( empty($usuario['nombre']) )
    {
        $errores[] = 'Usted debe ingresar un nombre';
    }

    //Valida el email del postulante.
    if( !filter_var($usuario['email'], FILTER_VALIDATE_EMAIL) )
    {
        $errores[] = 'Usted debe ingresar un correo electrónico con un formato correcto';
    }

    //Valida que haya ingresado una contraseña.
    if( empty($usuario['contrasena']) )
    {
        $errores[] = 'Usted debe ingresar una contraseña';
    }

    //Verifica si el archivo tiene algún error.
    if( $usuario['archivo']['error'] > 0 )
    {
        $errores[] = 'Usted debe ingresar su CV';
    }

    //Verifica si el archivo tiene una extensión correcta.
    if( $usuario['archivo']['error'] == 0 )
    {
        $pathinfo = pathinfo($usuario['archivo']['name']);
        $extension = $pathinfo['extension'];
        $extensiones_validas = ['pdf', 'docx'];

        if( !in_array( $extension, $extensiones_validas ) )
        {
            $errores[] = 'Usted debe cargar un  CV con formato pdf o docx';
        }

    }

    return $errores;

}