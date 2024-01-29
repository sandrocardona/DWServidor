<?php

require "src/funciones_ctes.php";
require __DIR__ . '/Slim/autoload.php';

$app= new \Slim\App;


/* EJERCICIO 1 */

/* ejercicio1.a) */
$app->get('/productos', function(){

    $respuesta["productos"]=obtener_productos();
    echo json_encode(array($respuesta));
});

/* ejercicio1.b) */
$app->get('/producto/{cod}', function($request){
    $respuesta=obtener_producto($request->getAttribute('cod'));
    echo json_encode($respuesta);
});

/* ejercicio1.c) */
$app->post('/producto/insertar',function($request){

    $datos[]=$request->getParam("cod");
    $datos[]=$request->getParam("nombre");
    $datos[]=$request->getParam("nombre_corto");
    $datos[]=$request->getParam("descripcion");
    $datos[]=$request->getParam("PVP");
    $datos[]=$request->getParam("familia");

     echo json_encode(insertar_producto($datos));
});

/* ejercicio1.d) */

$app->put('/producto/actualizar/{cod}',function($request){

    $datos[]=$request->getParam("nombre");
    $datos[]=$request->getParam("nombre_corto");
    $datos[]=$request->getParam("descripcion");
    $datos[]=$request->getParam("PVP");
    $datos[]=$request->getParam("familia");
    $datos[]=$request->getAttribute("cod");


    echo json_encode(actualizar_producto($datos));
});

/* ejercicio1.e) */

$app->delete('/producto/borrar/{cod}',function($request){

    echo json_encode(borrar_producto($request->getAttribute("cod")));
});

/* ejercicio1.f) */

$app->get('/familias',function(){

    echo json_encode(obtener_familias());
});

/* ejercicio1.g) */

$app->get('/repetido/{tabla}/{columna}/{valor}',function($request){
    
    echo json_encode(repetido($datos));
});

$app->run();
?>