<?php
session_name("examen3_17_18");
session_start();
require "src/constantes.php";

if(isset($_SESSION["usuario"])){
    //estoy logueado

    // Seguridad

    // Vista oportuna
}
else{
    require "vistas/vista_login.php";
}
?>