<?php
require "config_bd.php";

function login($lector,$clave){
    try{
        $conexion= new PDO("mysql:host=".SERVIDOR_BD.";dbname=".NOMBRE_BD,USUARIO_BD,CLAVE_BD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES 'utf8'"));
    }
    catch(PDOException $e){
        $respuesta["error"]="Imposible conectar:".$e->getMessage()." en login en funciones_servicios.php";
    }

    try{
        $consulta="select * from usuarios where lector=? and clave=?";
        $sentencia=$conexion->prepare($consulta);
        $sentencia->execute([$lector,$clave]);
    }
    catch(PDOException $e){
        $conexion=null;
        $sentencia=null;
        $respuesta["error"]="No se ha podido realizar la consulta en login en funciones_servicios.php";
    }

    if($sentencia->rowCount() > 0){
        /* iniciar la session */
        session_name("Examen_SW_22_23");
        session_start();
        /* recoger datos del usuario y api_session */
        $respuesta["usuario"]=$sentencia->fetch(PDO::FETCH_ASSOC);
        $respuesta["api_session"]=session_id();

        $_SESSION["lector"]=$respuesta["usuario"]["lector"];
        $_SESSION["clave"]=$respuesta["usuario"]["clave"];
        $_SESSION["tipo"]=$respuesta["usuario"]["tipo"];

    } else {
        $respuesta["mensaje"] = "El usuario no se encuentra en la BD en login en funciones_servicios.php";
    }

    return $respuesta;
}

/* OBTENER LIBROS */
function obtenerLibros(){
    try{
        $conexion= new PDO("mysql:host=".SERVIDOR_BD.";dbname=".NOMBRE_BD,USUARIO_BD,CLAVE_BD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES 'utf8'"));
    }
    catch(PDOException $e){
        $respuesta["error"]="Imposible conectar:".$e->getMessage()." en obtenerLibros en funciones_servicios.php";
    }

    try{
        $consulta="select * from libros";
        $sentencia=$conexion->prepare($consulta);
        $sentencia->execute();
    }
    catch(PDOException $e){
        $conexion=null;
        $sentencia=null;
        $respuesta["error"]="No se ha podido realizar la consulta en obtenerLibros en funciones_servicios.php";
    }

    $respuesta["libros"]=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    $conexion=null;
    $sentencia=null;

    return $respuesta;
}
?>
