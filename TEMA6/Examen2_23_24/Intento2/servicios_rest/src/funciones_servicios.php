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

/* ===== LOGIN ===== */
function login($usuario, $clave)
{
    try{
        $conexion= new PDO("mysql:host=".SERVIDOR_BD.";dbname=".NOMBRE_BD,USUARIO_BD,CLAVE_BD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES 'utf8'"));
    }
    catch(PDOException $e){
        $respuesta["error"]="No se ha podido conectar a la base de datos en login()";
    }

    try{
        $consulta="SELECT * FROM usuarios WHERE usuario=? and clave=?";
        $sentencia=$conexion->prepare($consulta);
        $sentencia->execute([$usuario,$clave]);
    }
    catch(PDOException $e){
        $respuesta["error"]="Error al realizar la consulta en login()";
        $conexion=null;
        $sentencia=null;
    }

    if($sentencia->rowCount() > 0){
        /* iniciar sesiones */
        session_name("Intento2");
        session_start();

        /* recoger datos usuario */
        $respuesta["usuario"]=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        $respuesta["api_session"]=session_id();

        $_SESSION["usuario"]=$respuesta["usuario"]["usuario"];
        $_SESSION["clave"]=$respuesta["usuario"]["clave"];
        $_SESSION["tipo"]=$respuesta["usuario"]["tipo"];

    } else {
        $respuesta["mensaje"]="El usuario no se encuentra en la BD en login()";
    }

    $consulta=null;
    $sentencia=null;
    return $respuesta;
}

?>
