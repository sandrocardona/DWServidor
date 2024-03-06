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

/* === salir === */
$app->post('/salir',function($request){
    session_id($request->getParam("api_session"));
    session_start();
    session_destroy();
    echo json_encode(array("logout"=>"Close session"));
});

/* === logueado === */
$app->post('/logueado',function($request){
    session_id($request->getParam("api_session"));
    session_start();

    if(isset($_SESSION["usuario"])){
        $datos[]=$_SESSION["usuario"];
        $datos[]=$_SESSION["clave"];
        echo json_encode(logueado($datos));
    } else {
        session_destroy();
        echo json_encode(array("No_auth"=>"No autorizado"));
    }
});

// Una vez creado servicios los pongo a disposición
$app->run();
?>
