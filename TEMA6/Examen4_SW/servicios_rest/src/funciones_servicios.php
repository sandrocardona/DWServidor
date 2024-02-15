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
function login($datos)
{
    try{
        $conexion= new PDO("mysql:host=".SERVIDOR_BD.";dbname=".NOMBRE_BD,USUARIO_BD,CLAVE_BD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES 'utf8'"));
    }
    catch(PDOException $e){
        $respuesta["error"]="Error realizando la conexion en login()";
    }

    try{
        $consulta="SELECT * FROM usuarios WHERE usuario=? and clave=?";
        $sentencia=$conexion->prepare($consulta);
        $sentencia->execute($datos);
    }
    catch(PDOException $e){
        $respuesta["error"]="Error realizando la consulta en login()";
    }

    if($sentencia->rowCount() > 0){
        /* iniciar sesion */
        session_name("Examen4_SW_23_24");
        session_start();
        $respuesta=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        /* capturar datos */
        $_SESSION["usuario"]=$respuesta["usuario"]["usuario"];
        $_SESSION["clave"]=$respuesta["usuario"]["clave"];
        $_SESSION["tipo"]=$respuesta["usuario"]["tipo"];
        $_SESSION["api_session"]=session_id();
    }else{
        $respuesta["mensaje"]="Usuario no se encuentra registrado en la BD";
    }

    return $respuesta;
}

/* ===== ALUMNOS ===== */
function alumnos()
{
    try{
        $conexion= new PDO("mysql:host=".SERVIDOR_BD.";dbname=".NOMBRE_BD,USUARIO_BD,CLAVE_BD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES 'utf8'"));
    }
    catch(PDOException $e){
        $respuesta["error"]="Error realizando la conexion en alumnos()";
    }

    try{
        $consulta="SELECT * FROM `usuarios` WHERE usuarios.tipo = 'alumno'";
        $sentencia=$conexion->prepare($consulta);
        $sentencia->execute();
    }
    catch(PDOException $e){
        $respuesta["error"]="Error realizando la consulta en login()";
    }

    $respuesta=$sentencia->fetchAll(PDO::FETCH_ASSOC);

    return $respuesta;
}
?>
