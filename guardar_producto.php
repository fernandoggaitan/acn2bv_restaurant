<?php

require_once('conf/conf.php');
require_once('_conexion.php');
require_once('consultas/consultas_productos.php');
require_once('funciones/funciones_input.php');

$usuario = $_SESSION['usuario'] ?? null;

if(is_null($usuario) or $usuario['rol'] != 'Administrador')
{
    header('Location: logout.php');
}

if( isset($_GET['id']) ){
    //El usuario está intentando editar un producto.
    $producto = getProductoById($conexion, $_GET['id']);

    if(!$producto){
        header('Location: listar_productos.php');
    }

}else{
    $producto = [
        'id' => test_input( $_POST['id'] ?? null ),
        'nombre' => test_input( $_POST['nombre'] ?? null ),
        'precio' => test_input( $_POST['precio'] ?? null ),
        'descuento' => test_input( $_POST['descuento'] ?? null ),
        'categoria' => test_input( $_POST['categoria'] ?? null ),
        'descripcion' => test_input( $_POST['descripcion'] ?? null ),
    ];
}

$errores = [];

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $errores = validarProducto($producto);

    if( count($errores) == 0 ){

        if( empty($producto['id']) ){
            addProducto($conexion, $producto);
        }else{
            updateProducto($conexion, $producto);
        }
        
        header('Location: listar_productos.php');

    }

}

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

                    <h1 class="mt-4"> Guardar producto</h1>

                    <div class="card mb-4">

                        <div class="card-header">
                            <i class="fas fa-list me-1"></i>
                        </div>

                        <div class="card-body">

                            <ul>
                                <?php foreach($errores as $error): ?>
                                    <li class="text text-danger"> <?php echo $error ?> </li>
                                <?php endforeach ?>
                            </ul>

                            <form action="guardar_producto.php" method="post">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese el nombre del producto" value="<?php echo $producto['nombre'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="precio" class="form-label">Precio</label>
                                    <input type="number" class="form-control" name="precio" id="precio" placeholder="Ingrese el precio del producto" value="<?php echo $producto['precio'] ?>" step="any">
                                </div>
                                <div class="mb-3">
                                    <label for="descuento" class="form-label">Descuento</label>
                                    <input type="number" min="0" max="9000000" class="form-control" name="descuento" id="descuento" placeholder="Ingrese el descuento del producto" value="<?php echo $producto['descuento'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="categoria" class="form-label">Categoría</label>
                                    <input type="text" class="form-control" name="categoria" id="categoria" placeholder="Ingrese la categoría del producto" value="<?php echo $producto['categoria'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Descripción</label>
                                    <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Ingrese la descripción del producto"><?php echo $producto['descripcion'] ?></textarea>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $producto['id'] ?>" />
                                <button type="submit" class="btn btn-success"> 
                                    <i class="fa-regular fa-floppy-disk"></i>
                                    Guardar 
                                </button>
                                <a href="listar_productos.php" class="btn btn-danger"> 
                                    <i class="fa-solid fa-trash"></i>
                                    Cancelar 
                                </a>
                            </form>
                        </div>

                    </div>

                </div>
            </main>
            
            <?php require('layout/_footer.php') ?>

        </div>
    </div>
    
    <?php require('layout/_js.php') ?>

</body>

</html>