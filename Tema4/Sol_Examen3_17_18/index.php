<?php
session_name("Examen3_17_18");
session_start();
require "src/func_ctes.php";

if(isset($_POST["btnSalir"]))
{
    session_destroy();
    header("Location:index.php");
    exit;
}


if(isset($_SESSION["usuario"]))
{
    /// Estoy logueado
    require "src/seguridad.php";

    //Vista oportuna
    //si es usuario normal
    require "vistas/vista_examen.php";
    //si es usuario admin
    /* 
        header("Location:ruta");
        exit;
     */
    
    mysqli_close($conexion);
}
else
{
   
    require "vistas/vista_login.php";


}


?>