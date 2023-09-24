<?php
    if(isset($_POST["submit"]))
    {
        $error_nombre=$_POST["name"]=="";
        $error_sexo=!isset($_POST["sexo"]);
        $error_form=$error_nombre || $error_sexo;
    }

    if(isset($_POST["submit"]) &&! $error_form)
    {
        require "vistas/getdatos.php";
    }
    else
    {
        require "vistas/superpagina.php";
    }
?>