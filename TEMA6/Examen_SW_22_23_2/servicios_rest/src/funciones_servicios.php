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

/* LOGIN */
function login($lector, $clave){
    try{
        $conexion= new PDO("mysql:host=".SERVIDOR_BD.";dbname=".NOMBRE_BD,USUARIO_BD,CLAVE_BD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES 'utf8'"));
    }
    catch(PDOException $e){
        $respuesta["error"]="Imposible conectar:".$e->getMessage();
    }

    try{
        $consulta="SELECT * FROM usuarios WHERE lector=? AND clave=?";
        $sentencia=$conexion->prepare($consulta);
        $sentencia->execute([$lector,$clave]);
    }
    catch(PDOException $e){
        $respuesta["error"]="Error al realizar la consulta en login()";
        $conexion=null;
        $sentencia=null;
    }

    if($sentencia->rowCount() > 0){
        /* iniciar sesion */
        session_name("Examen2");
        session_start();
        /* recoger datos */
        $respuesta["usuario"]=$sentencia->fetch(PDO::FETCH_ASSOC);
        $respuesta["api_session"]=session_id();

        $_SESSION["lector"]=$respuesta["usuario"]["lector"];
        $_SESSION["clave"]=$respuesta["usuario"]["clave"];
        $_SESSION["tipo"]=$respuesta["usuario"]["tipo"];
    } else {
        $respuesta["mensaje"]="Usuario no se encuentra registrado en la BD. En login()";
    }
}
/* LOGUEADO */

/* SALIR */

/* OBTENER LIBROS */
function obtenerLibros()
{
    try{
        $conexion= new PDO("mysql:host=".SERVIDOR_BD.";dbname=".NOMBRE_BD,USUARIO_BD,CLAVE_BD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES 'utf8'"));
    }
    catch(PDOException $e){
        $respuesta["error"]="Imposible conectar:".$e->getMessage();
    }

    try{
        $consulta="SELECT * FROM libros";
        $sentencia=$conexion->prepare($consulta);
        $sentencia->execute();
    }
    catch(PDOException $e){
        $respuesta["error"]="Error al realizar la consulta en obtenerLibros()";
        $conexion=null;
        $sentencia=null;
    }

    $respuesta["libros"]=$sentencia->fetchAll(PDO::FETCH_ASSOC);

    $conexion=null;
    $sentencia=null;
    return $respuesta;
}
?>
