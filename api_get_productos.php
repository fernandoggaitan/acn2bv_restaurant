<?php

header('Access-Control-Allow-Origin: *');

require_once('conf/conf.php');
require_once('_conexion.php');
require_once('consultas/consultas_productos.php');

$productos = getProductos($conexion);

echo json_encode($productos);

?>