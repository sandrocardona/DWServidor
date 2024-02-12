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

/* b) logueado */


/* c) salir */


/* d) obtenerLibros */
$app->get('/obtenerLibros',function(){
    echo json_encode(obtenerLibros());
});

// Una vez creado servicios los pongo a disposición
$app->run();
?>
