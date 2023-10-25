<?php

require_once('conf/conf.php');
require_once('_conexion.php');
require_once('consultas/consultas_productos.php');
require_once('funciones/funciones_paginador.php');

$productos = getProductos($conexion);

//Cantidad de productos en total.
$cantidad = count($productos);

//Página actual.
$pagina_actual = $_GET['pag'] ?? 1;

//Cuántos registros por página.
$cuantos_por_pagina = 5;

//Enlaces del paginado.
$paginado_enlaces = paginador_enlaces($cantidad, $pagina_actual, $cuantos_por_pagina);

$productos = paginador_lista($productos, $pagina_actual, $cuantos_por_pagina);


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Menú </title>
    <?php require('layout/_css.php') ?>
</head>

<body>

    <?php require('layout/_nav_cliente.php') ?>

    <div class="container margin-top-nav-fixed">
        <h1 class="text text-center"> Menú </h1>

        <?php foreach ($productos as $item) : ?>
            <div class="card mb-3">
                <div class="card-header">
                    <img src="img/iconos/<?php echo $item['categoria'] ?>.png" alt="<?php echo $item['categoria'] ?>" />
                </div>
                <div class="card-body">
                    <h2 class="card-title"><?php echo $item['nombre'] ?></h2>
                    <p class="card-text">
                        Precio: 
                        <?php if ($item['descuento'] > 0) : ?>
                            <span class="text-decoration-line-through"> $<?php echo $item['precio'] ?> </span>
                            <span class="text text-success"> $<?php echo $item['precio'] - $item['descuento'] ?> </span>
                        <?php else : ?>
                            $<?php echo $item['precio'] ?>
                        <?php endif ?>
                    </p>
                </div>
            </div>
        <?php endforeach ?>
        
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php if($paginado_enlaces['anterior']): ?>
                    <li class="page-item">
                        <a class="page-link" href="?pag=<?php echo $paginado_enlaces['primero'] ?>"> Primero </a>                        
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="?pag=<?php echo $paginado_enlaces['anterior'] ?>"> <?php echo $paginado_enlaces['anterior'] ?> </a>
                    </li>
                <?php endif ?>
                <li class="page-item active"> 
                    <span class="page-link">
                        <?php echo $paginado_enlaces['actual'] ?> 
                    </span>
                </li>
                <?php if($paginado_enlaces['siguiente']): ?>
                    <li class="page-item">
                        <a class="page-link" href="?pag=<?php echo $paginado_enlaces['siguiente'] ?>"> <?php echo $paginado_enlaces['siguiente'] ?> </a>
                    </li>
                    <li class="page-item">
                    <a class="page-link" href="?pag=<?php echo $paginado_enlaces['ultimo'] ?>"> Último </a>
                    </li>
                <?php endif ?>
            </ul>
        </nav>

    </div>

    <?php require('layout/_js.php') ?>

</body>

</html>