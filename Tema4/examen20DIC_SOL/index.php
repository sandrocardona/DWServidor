<?php
session_name("examen3_24_24");
session_start();

require "src/constantes.php";

try{
    $conexion=mysqli_connect(SERVIDOR_BD,USUARIO,CLAVE_BD,NOMBRE_BD);
    mysqli_set_charset($conexion, "utf8");
}
catch(Exception $e){
    session_destroy();
    die(error_page("Examen3 2023 2024","<p>No se ha podido conectar a la BD: ".$e -> getMessage()."</p>"));
}

if(isset($_SESSION["usuario"])){
/* me he logueado en algún momento */
try{
    $consulta="select * from usuarios where lector ='".$_SESSION["usuario"]."' and clave='".$_SESSION["clave"]."'";
    $resultado=mysqli_query($conexion, $consulta);
}
catch(Exception $e){
    session_destroy();
    mysqli_close($conexion);
}
} else {
/* no estoy logueado */
require "vistas/vista_home.php";
}

mysqli_close($conexion);
?>