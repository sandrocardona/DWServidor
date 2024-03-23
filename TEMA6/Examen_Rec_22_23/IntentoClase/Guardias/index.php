<?php
session_name("IntentoClase");
session_start();

require "./src/constantes.php";

if(isset($_POST["btnSalir"])){
    session_destroy();
    header("Location:index.php");
    exit;
}

if(isset($_SESSION["usuario"])){
    require "./vistas/vista_examen.php";
    require "./src/seguridad.php";
} else {
    require "./vistas/vista_login.php";
}
?>
