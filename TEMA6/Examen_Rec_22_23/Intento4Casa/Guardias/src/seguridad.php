<?php
    $url=DIR_SERV."/logueado";
    $datos["api_session"]=$_SESSION["api_session"];
    $respuesta=consumir_servicios_REST($url,"POST",$datos);
    $obj_seguridad=json_decode($respuesta);

    if(!$obj_seguridad){
        session_destroy();
        die(error_page("NO OBJ","OBJ SEGURIDAD", $respuesta));
    }

    if(isset($obj_seguridad->error)){
        session_destroy();
        die(error_page("NO OBJ","OBJ SEGURIDAD", $obj_seguridad->error));
    }

    if(isset($obj_seguridad->mensaje)){
        session_unset();
        $_SESSION["mensaje"]="Has sido baneado";
        header("Location:index.php");
    }

    if(isset($obj_seguridad->no_auth)){
        session_unset();
        $_SESSION["mensaje"]="No tienes permiso en seguridad";
        header("Location:index.php");
        exit;
    }

    $datos_log=$obj_seguridad->usuario;

    if(time() - $_SESSION["ult_accion"] > MINUTOS*60){
        session_unset();
        $_SESSION["mensaje"]="Tiempo de sesion expirado";
        header("Location:index.php");
        exit;
    } else {
        $_SESSION["ult_accion"]=time();
    }

?>