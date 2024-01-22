<?php

define("SERVIDOR_BD","localhost");
define("USUARIO_BD","jose");
define("CLAVE_BD","josefa");
define("NOMBRE _BD","bd_tienda");

function obtener_productos(){
    try{
        $conexion=new PDO("mysql:host=".SERVIDOR_BD.";dbname=".NOMBRE_BD,USUARIO_BD,CLAVE_BD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")); //la sentencia entre paréntesis no hay que memorizarla
    }
    catch(PDOException $e){

        return array("mensaje_error"=>"no se ha podido conectar a la BD: ".$e->getMessage());
    }

    try{
      $consulta="select * from producto";
      $sentencia=$conexion->prepare($consulta);
      $sentencia->execute();
    }
    catch(PDOException $e){
        $sentencia=null;
        $conexion=null;
        return array("mensaje_error"=>"no se ha podido realizar consulta: ".$e->getMessage());
    }

    $respuesta["productos"]=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    $sentencia=null;
    $conexion=null;
    return $respuesta;
}

?>