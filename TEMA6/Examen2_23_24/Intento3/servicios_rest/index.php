<?php

require "src/funciones_servicios.php";
require __DIR__ . '/Slim/autoload.php';

$app= new \Slim\App;



$app->get('/conexion_PDO',function($request){
    echo json_encode(conexion_pdo());
});

/* obtener a los profesores */
$app->get('/obtener_profesores',function($request){
    echo json_encode(obtener_profesores());
});

/* obtener datos de horarios */
$app->get('/obtener_horarios',function($request){
    $id_profesor=$request->getParam("id_profesor");
    echo json_encode(obtener_horarios($id_profesor));
});

// Una vez creado servicios los pongo a disposición
$app->run();
?>
