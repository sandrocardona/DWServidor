<?php

require "src/funciones_servicios.php";
require __DIR__ . '/Slim/autoload.php';

$app= new \Slim\App;



$app->get('/conexion_PDO',function($request){
    echo json_encode(conexion_pdo());
});

/* === nombre profesores === */
$app->get('/datos_profesores',function($request){
    echo json_encode(datos_profesores());
});


// Una vez creado servicios los pongo a disposición
$app->run();
?>
