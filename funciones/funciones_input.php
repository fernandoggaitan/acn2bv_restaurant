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