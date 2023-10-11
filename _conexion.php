<?php

try{
    $conexion = new PDO(
        'mysql:host=localhost;dbname=restaurant;charset=utf8',
        'root',
        ''
    );
}catch(PDOException $e){
    //echo $e->getMessage();
    header('Location: error.php');
}

?>