<?php
session_name("Intento5");
session_start();

require "./src/constantes.php";

if(isset($_POST["btnSalir"])){
    session_destroy();
    header("Location:index.php");
}

if(isset($_SESSION["usuario"])){
    require "./src/seguridad.php";
    require "./vistas/vista_examen.php";
} else {
    require "./vistas/vista_login.php";
}

?>
