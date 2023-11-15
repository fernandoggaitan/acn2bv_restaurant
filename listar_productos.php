<?php

//Traigo la conexión a la base de datos.
require_once('conf/conf.php');
require_once('_conexion.php');
require_once('consultas/consultas_productos.php');

$usuario = $_SESSION['usuario'] ?? null;

if(is_null($usuario) or $usuario['rol'] != 'Administrador')
{
    header('Location: logout.php');
}

$productos = getProductos($conexion);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Lista de productos</title>
    
    <?php require('layout/_css.php') ?>

</head>

<body>
    
    <?php require('layout/_nav_top.php') ?>

    <div id="layoutSidenav">
    
        <?php require('layout/_nav_left.php') ?>
    
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">

                    <h1 class="mt-4"> Lista de productos </h1>

                    <div class="card mb-4">

                        <div class="card-header">
                            <i class="fas fa-list me-1"></i>
                        </div>

                        <div class="card-body">
                            <a href="guardar_producto.php" class="btn btn-primary"> 
                                <i class="fa-solid fa-plus"></i>
                                Agregar producto 
                            </a>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> Nombre </th>
                                        <th> Precio </th>
                                        <th> Descuento </th>
                                        <th> Categoría </th>
                                        <th> Acciones </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($productos as $prod): ?>
                                        <tr>
                                            <td> <?php echo $prod['nombre'] ?> </td>
                                            <td> <?php echo $prod['precio'] ?> </td>
                                            <td> <?php echo $prod['descuento'] ?> </td>
                                            <td> <?php echo $prod['categoria'] ?> </td>
                                            <td> 
                                                <a href="guardar_producto.php?id=<?php echo $prod['id'] ?>" class="btn btn-primary"> 
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                    Editar 
                                                </a>
                                                <a href="eliminar_producto.php?id=<?php echo $prod['id'] ?>" class="btn btn-danger btn-eliminar"> 
                                                    <i class="fa-solid fa-trash"></i>
                                                    Eliminar 
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                
            </main>
            
            <?php require('layout/_footer.php') ?>

        </div>
    </div>
    
    <?php require('layout/_js.php') ?>

    <script src="js/productos/listar_productos.js"></script>

</body>

</html>