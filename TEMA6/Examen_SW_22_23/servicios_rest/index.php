<?php

require "src/funciones_servicios.php";
require __DIR__ . '/Slim/autoload.php';

$app= new \Slim\App;



/* $app->get('/conexion_PDO',function($request){

    echo json_encode(conexion_pdo());
}); */

/* a) login */
$app->post('/login',function($request){
    $lector=$request->getParam("lector");
    $clave=$request->getParam("clave");
    echo json_encode(login($lector,$clave));
});

$app->get('/login',function($request){
    $lector="scardona";
    $clave=md5("123");
    echo json_encode(login($lector,$clave));
});



// Una vez creado servicios los pongo a disposición
$app->run();
?>
