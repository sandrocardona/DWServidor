<?php

require "src/funciones_servicios.php";
require __DIR__ . '/Slim/autoload.php';

$app= new \Slim\App;

$app->get('/conexion_PDO',function($request){
    echo json_encode(conexion_pdo());
});

$app->post('/login',function($request){
    $usuario=$request->getParam("usuario");
    $clave=$request->getParam("clave");
    echo json_encode(login($usuario,$clave));
});

// Una vez creado servicios los pongo a disposición
$app->run();
?>
