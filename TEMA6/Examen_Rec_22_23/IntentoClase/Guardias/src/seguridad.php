<?php
$url=DIR_SERV."/logueado";
$datos["api_session"]=$_SESSION["api_session"];
$respuesta=consumir_servicios_REST($url, "POST", $datos)

?>