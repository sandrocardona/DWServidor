<?php
session_name("Intento2casa");
session_start();

require "./src/constantes.php";

if(isset($_SESSION["usuario"])){
    require "./vistas/seguridad.php";
    require "./vistas/vista_examen.php";
} else {
    require "./vistas/vista_login.php";
}

?>