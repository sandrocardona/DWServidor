<?php
session_name("examen3_23_24");
session_start();

require "src/funct_ctes.php";

if(isset($_POST["btnSalir"]))
{
    session_destroy();
    header("Location:index.php");
    exit;
}


try{
    $conexion=new PDO("mysql:host=".SERVIDOR_BD.";dbname=".NOMBRE_BD,USUARIO_BD,CLAVE_BD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch(PDOException $e)
{
    session_destroy();
    die("<p>No ha podido conectarse a la base de datos".$e->getMessage()."</p></body></html>");
}

echo "<p>conectado</p>";

if(isset($_SESSION["usuario"]))
{
    $salto="index.php";
    require "src/seguridad.php";

    if($datos_usuario_logueado["tipo"]=="normal")
    {
        require "vistas/vista_normal.php";
    }
    else
    {
        header("Location:admin/gest_libros.php");
        exit;
    }

}
else
{
    require "vistas/vista_home.php";    

}

?>