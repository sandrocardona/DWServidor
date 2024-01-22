<?php

require "src/funciones_ctes.php";
require __DIR__ . '/Slim/autoload.php';

$app= new \Slim\App;


/* EJERCICIO 1 */


$app->get('/productos', function(){

    $respuesta["productos"]=obtener_productos();
    echo json_encode(array($respuesta));
});


$app->run();
?>