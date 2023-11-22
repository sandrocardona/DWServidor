<?php
require "src/constantes.php";
//conexion a base de datos
try{
    $conexion = mysqli_connect(DIRECCION,USUARIO,PASSWORD,BASE_DATOS);
    mysqli_set_charset($conexion, "utf8");

}
catch(Excepcion $e){
    die("<p>No se ha podido conectar a la base de datos: ".$e -> getMessage()."</p>");
}

require "vistas/vista_tabla.php";


?>