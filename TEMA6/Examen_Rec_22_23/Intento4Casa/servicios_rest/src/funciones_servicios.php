<?php
require "config_bd.php";

function conexion_pdo()
{
    try{
        $conexion= new PDO("mysql:host=".SERVIDOR_BD.";dbname=".NOMBRE_BD,USUARIO_BD,CLAVE_BD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES 'utf8'"));
        
        $respuesta["mensaje"]="Conexi&oacute;n a la BD realizada con &eacute;xito";
        
        $conexion=null;
    }
    catch(PDOException $e){
        $respuesta["error"]="Imposible conectar:".$e->getMessage();
    }
    return $respuesta;
}

/* === login === */
function login($datos)
{
    try{
        $conexion= new PDO("mysql:host=".SERVIDOR_BD.";dbname=".NOMBRE_BD,USUARIO_BD,CLAVE_BD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES 'utf8'"));
    }
    catch(PDOException $e){
        $respuesta["error"]="Imposible conectar a la BD en login()";
    }

    try{
        $consulta="SELECT * FROM usuarios WHERE usuario=? AND clave=?";
        $sentencia=$conexion->prepare($consulta);
        $sentencia->execute($datos);
    }
    catch(PDOException $e){
        $respuesta["error"]="Imposible realizar la consulta en login()";
    }

    if($sentencia->rowCount() > 0){
        $respuesta["usuario"]=$sentencia->fetch(PDO::FETCH_ASSOC);

        session_name("login4");
        session_start();

        $_SESSION["usuario"]=$respuesta["usuario"]["usuario"];
        $_SESSION["clave"]=$respuesta["usuario"]["clave"];
        $respuesta["api_session"]=session_id();

    } else {
        $respuesta["mensaje"]="Usuario no registrado en la BD";
    }

    return $respuesta;
}

/* === login === */
function logueado($datos)
{
    try{
        $conexion= new PDO("mysql:host=".SERVIDOR_BD.";dbname=".NOMBRE_BD,USUARIO_BD,CLAVE_BD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES 'utf8'"));
    }
    catch(PDOException $e){
        $respuesta["error"]="Imposible conectar a la BD en login()";
    }

    try{
        $consulta="SELECT * FROM usuarios WHERE usuario=? AND clave=?";
        $sentencia=$conexion->prepare($consulta);
        $sentencia->execute($datos);
    }
    catch(PDOException $e){
        $respuesta["error"]="Imposible realizar la consulta en login()";
    }

    if($sentencia->rowCount() > 0){
        $respuesta["usuario"]=$sentencia->fetch(PDO::FETCH_ASSOC);
    } else {
        $respuesta["mensaje"]="Usuario no registrado en la BD";
    }

    return $respuesta;
}

?>
