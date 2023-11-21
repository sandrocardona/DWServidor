<?php
require "src/constantes.php";
//conexion a base de datos
try{
    mysqli_connect(DIRECCION,USUARIO,PASSWORD,BASE_DATOS);
}
catch(Excepcion $e){
    die("<p>No se ha podido conectar a la base de datos: ".$e -> getMessage()."</p>");
}

require "vistas/vista_tabla.php";
?>