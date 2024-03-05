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

/* ===== OBTENER PROFESORES ===== */
function obtener_profesores()
{
    try{
        $conexion= new PDO("mysql:host=".SERVIDOR_BD.";dbname=".NOMBRE_BD,USUARIO_BD,CLAVE_BD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES 'utf8'"));
    }
    catch(PDOException $e){
        $respuesta["error"]="Imposible conectar a la DB en obtener_profesores()";
    }

    try{
        $consulta="SELECT * FROM usuarios";
        $sentencia=$conexion->prepare($consulta);
        $sentencia->execute();
    }
    catch(PDOException $e){
        $respuesta["error"]="Error al realizar la consulta a la DB en obtener_profesores()";
        $conexion=null;
        $sentencia=null;
    }

    $respuesta["profesores"]=$sentencia->fetchAll(PDO::FETCH_ASSOC);

    return $respuesta;
}

/* ===== OBTENER PROFESORES ===== */
function obtener_horarios($id_profesor)
{
    try{
        $conexion= new PDO("mysql:host=".SERVIDOR_BD.";dbname=".NOMBRE_BD,USUARIO_BD,CLAVE_BD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES 'utf8'"));
    }
    catch(PDOException $e){
        $respuesta["error"]="Imposible conectar a la DB en obtener_horarios()";
    }

    try{
        $consulta="SELECT horario_lectivo.dia, horario_lectivo.hora, grupos.nombre FROM horario_lectivo, grupos WHERE grupos.id_grupo=horario_lectivo.grupo AND horario_lectivo.usuario=?";
        $sentencia=$conexion->prepare($consulta);
        $sentencia->execute($id_profesor);
    }
    catch(PDOException $e){
        $respuesta["error"]="Error al realizar la consulta a la DB en obtener_horarios()";
        $conexion=null;
        $sentencia=null;
    }

    $respuesta["horarios"]=$sentencia->fetchAll(PDO::FETCH_ASSOC);

    return $respuesta;
}

?>
