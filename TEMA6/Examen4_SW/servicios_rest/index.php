<?php

require "src/funciones_servicios.php";
require __DIR__ . '/Slim/autoload.php';

$app= new \Slim\App;



$app->get('/conexion_PDO',function($request){

    echo json_encode(conexion_pdo());
});

$app->post("/login",function($request){
    $datos[]=$request->getParam("usuario");
    $datos[]=$request->getParam("clave");
    echo json_encode(login($datos));
});

$app->get("/alumnos",function(){

    echo json_encode(alumnos());
});
// Una vez creado servicios los pongo a disposición
$app->run();
?>
