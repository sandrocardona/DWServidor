<?php
//funciones
function error_page($title,$body){//Crea una página web
    $page='<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>'.$title.'</title>
    </head>
    <body>
        '.$body.'
    </body>
    </html>';
    return $page;
}
function repetido($conexion,$tabla,$columna,$valor){
    try{
        $consulta="select * from ".$tabla." where ".$columna." = ".$valor."";//string que representa a la consulta
        $resultado=mysqli_query($conexion,$consulta);
        $respuesta=mysqli_num_rows($resultado)>0;
        mysqli_free_result($resultado);
    }
    catch(Exception $e){
        mysqli_close($conexion);
        return error_page("Práctica 1er CRUD","<h1>Práctica 1er CRUD</h1><p>No se ha podido conectar a la base:".$e->getMessage()."</p>");
    }
    return $respuesta;
}
?>