<?php

session_name("recuperacion22-23");
session_start();

require "./src/constantes.php";

if(isset($_POST["btnSalir"])){
    $url=DIR_SERV."/salir";
    consumir_servicios_REST($url, "POST", $_SESSION["api_session"]);
    session_destroy();
    header("Location:index.php");
    exit;
}

if(isset($_SESSION["usuario"])){
    require "./vistas/vista_examen.php";
} else {
    require "./vistas/vista_login.php";
}

?>