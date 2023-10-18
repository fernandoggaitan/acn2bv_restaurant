<?php

//Traigo la conexión a la base de datos.
require_once('_conexion.php');
require_once('consultas/consultas_productos.php');

$productos = getProductos($conexion);


?>

<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Menú </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <h1 class="text text-center"> Menú </h1>
        <table class="table table-bordered">
            <thead>
                <tr>                    
                    <th> Categoría </th>
                    <th> Nombre </th>
                    <th> Precio </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($productos as $item): ?>
                    <tr>
                        <td>
                            <img src="img/iconos/<?php echo $item['categoria'] ?>.png" alt="<?php echo $item['categoria'] ?>" />
                            <?php echo $item['categoria'] ?>
                        </td>
                        <td> <?php echo $item['nombre'] ?> </td>
                        <td>
                            <?php if($item['descuento'] > 0): ?>
                                <span class="text-decoration-line-through"> $<?php echo $item['precio'] ?> </span>
                                <span class="text text-success"> $<?php echo $item['precio'] - $item['descuento'] ?> </span>
                            <?php else: ?>
                                $<?php echo $item['precio'] ?>
                            <?php endif ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    
</body>

</html>