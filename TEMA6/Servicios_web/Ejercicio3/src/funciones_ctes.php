<?php

define("SERVIDOR_BD","localhost");
define("USUARIO_BD","jose");
define("CLAVE_BD","josefa");
define("NOMBRE_BD","bd_tienda");

/* OBTENER PRODUCTOS */

function login($usuario,$clave){
    try{
        $conexion=new PDO("mysql:host=".SERVIDOR_BD.";dbname=".NOMBRE_BD,USUARIO_BD,CLAVE_BD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")); //la sentencia entre paréntesis no hay que memorizarla
    }
    catch(PDOException $e){

        return array("mensaje_error"=>"no se ha podido conectar a la BD: ".$e->getMessage()." en login funciones_ctes");
    }

    try{
      $consulta="select * from usuarios where usuario=? and clave=?";
      $sentencia=$conexion->prepare($consulta);
      $sentencia->execute($usuario,$clave);
    }
    catch(PDOException $e){
        $sentencia=null;
        $conexion=null;
        return array("mensaje_error"=>"no se ha podido realizar consulta: ".$e->getMessage()." en login funciones_ctes");
    }

    if($sentencia->rowCount()>0)
        $respuesta["usuario"]=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    else
        $respuesta["mensaje"]="El usuario no se encuentra en la BD en login funciones_ctes";

    $sentencia=null;
    $conexion=null;

    return $respuesta;
}



?>