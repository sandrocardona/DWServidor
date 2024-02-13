<?php

require "src/funciones_servicios.php";
require __DIR__ . '/Slim/autoload.php';

$app= new \Slim\App;

$app->get('/conexion_PDO',function($request){
    echo json_encode(conexion_pdo());
});

$app->get('/datosProfesor',function($request){
    echo json_encode(datosProfesor());
});

$app->post('/obtenerHorario', function($request){
    $id_profesor=$request->getParam("id_profesor");
    echo json_encode(obtenerHorario($id_profesor));
});
// Una vez creado servicios los pongo a disposición
$app->run();
?>
