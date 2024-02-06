<?php
require "config_bd.php";

function login($lector,$clave){
    session_start();
    try{
        $conexion= new PDO("mysql:host=".SERVIDOR_BD.";dbname=".NOMBRE_BD,USUARIO_BD,CLAVE_BD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES 'utf8'"));
    }
    catch(PDOException $e){
        $respuesta["error"]="Imposible conectar:".$e->getMessage()." en funciones_servicios.php";
        session_destroy();
    }

    try{
        $consulta="select * from usuarios where lector=? and clave=?";
        $sentencia=$conexion->prepare($consulta);
        $sentencia->execute([$lector,$clave]);
    }
    catch(PDOException $e){
        $conexion=null;
        $sentencia=null;
        session_destroy();
        return array("error"=>"No se ha podido realizar la consulta en funciones_servicios.php");
    }

    $obj=$sentencia->fetch(PDO::FETCH_ASSOC);
    if(!$obj){
        return array("mensaje"=>"Usuario no registrado en BD");
    } else {

        return array("usuario"=>$lector,"api_session"=>session_id());
    }

    return $respuesta;
}
?>
