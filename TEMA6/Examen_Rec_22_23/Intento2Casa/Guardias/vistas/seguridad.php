<?php
    $url=DIR_SERV."/logueado";
    $datos["api_session"]=$_SESSION["api_session"];
    $respuesta=consumir_servicios_REST($url,"GET",$datos);
    $obj_seguridad=json_decode($respuesta);

    if(!$obj_seguridad){

    }

    if(isset($obj->error)){

    }

    if(isset($obj->mensaje)){

    }

    if(isset($obj->not_auth)){
        
    }
?>