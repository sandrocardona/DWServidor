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

/* ===== login ===== */
function login($datos)
{
    try{
        /* conexion a bd */
        $conexion= new PDO("mysql:host=".SERVIDOR_BD.";dbname=".NOMBRE_BD,USUARIO_BD,CLAVE_BD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES 'utf8'"));
    }
    catch(PDOException $e){
        /* mensaje de respuesta en caso de error de conexion */
        $respuesta["error"]="Error al conectarse a la BD en login()";
    }

    try{
        /* consulta a BD */
        $consulta="SELECT * FROM usuarios WHERE usuario=? AND clave=?";
        /* preparamos la consulta */
        $sentencia=$conexion->prepare($consulta);
        /* ejecutamos los datos */
        $sentencia->execute($datos);

        /* en caso de que existan o no usuarios */
        if($sentencia->rowCount() > 0){
            /* asociamos al indice usuario la respuesta a la consulta */
            $respuesta["usuario"]=$sentencia->fetch(PDO::FETCH_ASSOC);
            /* damos un nombre a la sesión y la iniciamos */
            session_name("api_exam_rec_sw_22_23");
            session_start();
            /* asignamos a las SESSION las respuestas a la consulta */
            $_SESSION["usuario"]=$respuesta["usuario"]["usuario"];
            $_SESSION["clave"]=$respuesta["usuario"]["clave"];
            $respuesta["api_session"]=session_id();
        } else {
            $respuesta["mensaje"]="Usuario no registrado en BD";
        }
    }
    catch(PDOException $e){
        /* mensaje de respuesta en caso de error de consulta */
        $respuesta["error"]="Error al realizar la consulta a la BD en login()";
    }

    return $respuesta;
}

?>
