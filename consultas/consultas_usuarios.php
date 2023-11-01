<?php

function addUsuario(PDO $conexion, $usuario)
{

    $consulta = $conexion->prepare('
        INSERT INTO usuarios(nombre, email, contrasena, archivo, rol)
        VALUES(:nombre, :email, :contrasena, :archivo, :rol)
    ');

    $consulta->bindValue(':nombre', $usuario['nombre']);
    $consulta->bindValue(':email', $usuario['email']);
    $consulta->bindValue(':contrasena', $usuario['contrasena']);
    $consulta->bindValue(':archivo', $usuario['archivo']);
    $consulta->bindValue(':rol', $usuario['rol']);

    $consulta->execute();

}

function getUsuarioByEmail(PDO $conexion, $email)
{

    //Preparo la consulta.
    $consulta = $conexion->prepare('
        SELECT id, nombre, email, contrasena, rol
        FROM usuarios
        WHERE email = :email
    ');

    $consulta->bindValue(':email', $email);

    //Ejecuto la consulta.
    $consulta->execute();

    //Recuperamos la lista.
    $producto = $consulta->fetch(PDO::FETCH_ASSOC);

    return $producto;

}

?>