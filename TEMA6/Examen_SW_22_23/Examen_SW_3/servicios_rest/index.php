<?php

require "src/funciones_servicios.php";
require __DIR__ . '/Slim/autoload.php';

$app= new \Slim\App;



$app->get('/conexion_PDO',function($request){
    echo json_encode(conexion_pdo());
});

/* ===== OBTENER LIBROS ===== */
$app->get('/obtenerLibros',function($request){
    echo json_encode(obtenerLibros());
});

// Una vez creado servicios los pongo a disposición
$app->run();
?>
