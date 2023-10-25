<?php

require('_conexion.php');
require('consultas/consultas_productos.php');

$id = $_GET['id'] ?? null;

if($id)
{
    deleteProducto($conexion, $id);
}

header('Location: listar_productos.php');