<?php
session_name("examen3_24_24");
session_start();

require "src/constantes.php";

if(isset($_SESSION["usuario"])){

} else {
    header("Location:../index.php");
    exit();
}