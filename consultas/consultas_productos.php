<?php

function getProductos(PDO $conexion)
{

    //Preparo la consulta.
    $consulta = $conexion->prepare('
        SELECT id, nombre, precio, descuento, categoria
        FROM productos
    ');

    //Ejecuto la consulta.
    $consulta->execute();

    //Recuperamos la lista.
    $productos = $consulta->fetchAll(PDO::FETCH_ASSOC);

    return $productos;

}

function addProducto(PDO $conexion, $producto)
{

    $consulta = $conexion->prepare('
        INSERT INTO productos(nombre, descripcion, precio, descuento, categoria)
        VALUES(:nombre, :descripcion, :precio, :descuento, :categoria)
    ');

    $consulta->bindValue(':nombre', $producto['nombre']);
    $consulta->bindValue(':descripcion', $producto['descripcion']);
    $consulta->bindValue(':precio', $producto['precio']);
    $consulta->bindValue(':descuento', $producto['descuento']);
    $consulta->bindValue(':categoria', $producto['categoria']);

    $consulta->execute();

}

function getProductoById(PDO $conexion, $id)
{

    //Preparo la consulta.
    $consulta = $conexion->prepare('
        SELECT id, nombre, precio, descuento, categoria, descripcion
        FROM productos
        WHERE id = :id
    ');

    $consulta->bindValue(':id', $id);

    //Ejecuto la consulta.
    $consulta->execute();

    //Recuperamos la lista.
    $producto = $consulta->fetch(PDO::FETCH_ASSOC);

    return $producto;

    echo "El usuario se llama: {$producto['nombre']}";

}


function updateProducto(PDO $conexion, $producto)
{

    $consulta = $conexion->prepare('
        UPDATE productos
        SET
            nombre = :nombre,
            descripcion = :descripcion,
            precio = :precio,
            descuento = :descuento,
            categoria = :categoria
        WHERE id = :id
    ');

    $consulta->bindValue(':nombre', $producto['nombre']);
    $consulta->bindValue(':descripcion', $producto['descripcion']);
    $consulta->bindValue(':precio', $producto['precio']);
    $consulta->bindValue(':descuento', $producto['descuento']);
    $consulta->bindValue(':categoria', $producto['categoria']);
    $consulta->bindValue(':id', $producto['id']);

    $consulta->execute();

}

?>