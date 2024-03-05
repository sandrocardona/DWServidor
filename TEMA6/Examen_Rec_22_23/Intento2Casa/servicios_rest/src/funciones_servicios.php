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
        $respuesta["error"]="Imposible conectar a la DB en login()";
    }

    try{
        $consulta="SELECT * FROM usuarios WHERE usuario=? AND clave=?";
        $sentencia=$conexion->prepare($consulta);
        $sentencia->execute($datos);
    }
    catch(PDOException $e){
        $respuesta["error"]="Imposible realizar la consulta a la DB en login()";
        $conexion=null;
    }

    if($sentencia->rowCount() > 0){
        session_name("Intento2casa");
        session_start();
    
        $respuesta["usuario"]=$sentencia->fetch(PDO::FETCH_ASSOC);
        $_SESSION["usuario"]=$respuesta["usuario"]["usuario"];
        $_SESSION["clave"]=$respuesta["usuario"]["clave"];
        $_SESSION["api_session"]=session_id();
    } else {
        $respuesta["mensaje"]="El usuario no se encuentra registrado en la BD";
    }

    return $respuesta;
}

?>
