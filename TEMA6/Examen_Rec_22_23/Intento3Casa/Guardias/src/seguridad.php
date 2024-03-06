<?php
$url=DIR_SERV."/logueado";
$datos["api_session"]=$_SESSION["api_session"];
$respuesta=consumir_servicios_REST($url, "POST", $datos);
$obj_seguridad=json_decode($respuesta);

if(!$obj_seguridad){
    session_destroy();
    die(error_page("NO OBJ","obj_seguridad",$respuesta));
}

if(isset($obj_seguridad->error)){
    session_destroy();
    die(error_page("ERROR","OBJ_SEGURIDAD",$obj_seguridad->error));
}

if(isset($obj_seguridad->mensaje)){
    session_unset();
    $_SESSION["mensaje"]="Has sido baneado";
    header("Location:index.php");
    exit;
}

if(isset($obj_seguridad->no_auth)){
    session_unset();
    $_SESSION["mensaje"]="tiempo de sesion ha expirado por la api";
    header("Location:index.php");
    exit;
}

$datos_log=$obj_seguridad->usuario;
if(time() - $_SESSION["ult_accion"] > MINUTOS*60){
    session_unset();
    $_SESSION["mensaje"]="tiempo de sesión expirado por aplicación";
    header("Location:index.php");
    exit;
} else {
    $_SESSION["ult_accion"]=time();
}
?>