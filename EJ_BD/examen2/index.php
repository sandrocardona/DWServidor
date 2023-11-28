<?php
require "vistas/constantes.php";

try{
    $conexion = mysqli_connect(SERVIDOR,NOMBRE,PWD,BD);
    mysqli_set_charset($conexion, "utf8");
}
catch(Exception $e){
    die("<p>No se ha podido conectar a la base de datos: ".$e->getMessage()."</p>");
}

require "vistas/seleccion.php";

if(isset($_POST["btnVerNotas"])){
    /*código para mantener los id*/
    require "vistas/mostrar_notas.php";
}

if(isset($_POST["btnBorrar"])){
    $prueba=$_POST["alumno"];
    echo "<p>".$prueba."</p>";
}

?>