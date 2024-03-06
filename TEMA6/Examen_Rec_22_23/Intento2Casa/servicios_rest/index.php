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

/* === login === */
$app->get('/logueado',function($request){
    /* recoger token */
    $token=$request->getParam("api_session");

    /* inicializar session */
    session_id($token);
    session_start();

    if(isset($_SESSION["usuario"])){
        json_encode(logueado($_SESSION["usuario"],$_SESSION["clave"]));
    } else {
        session_destroy();
        echo json_encode(array("not_auth"=>"No tienes permiso en logueado"));
    }
});

// Una vez creado servicios los pongo a disposición
$app->run();
?>
