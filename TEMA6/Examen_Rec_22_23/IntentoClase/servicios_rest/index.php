<?php

require "src/funciones_servicios.php";
require __DIR__ . '/Slim/autoload.php';

$app= new \Slim\App;



$app->get('/conexion_PDO',function($request){

    echo json_encode(conexion_pdo());
});

/* === login === */
$app->post('/login',function($request){
    $datos[]=$request->getParam("usuario");
    $datos[]=$request->getParam("clave");

    echo json_encode(login($datos));
});

/* === logueado === */
$app->post('/logueado',function($request){
    session_id($request->getParam("api_session"));
    session_start();
    if(isset($_SESSION["usuario"])){
        echo json_encode(logueado($_SESSION["usuario"],$_SESSION["clave"]));
    } else {
        session_destroy();
        echo json_encode(array("no_auth"=>"No tienes permiso en logueado"));
    }
});


// Una vez creado servicios los pongo a disposición
$app->run();
?>
