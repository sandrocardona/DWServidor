<?php
session_name("examen2");
session_start();

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
    /*mantener el id y el nombre del alumno*/
    $_SESSION["id_alumno"]=$_POST["alumno"];
    $_SESSION["nombre"]=$nombre_alumno;

    /*Mostrar la tabla de notas*/
    require "vistas/mostrar_notas.php";
}

if(isset($_POST["btnBorrar"])){
    /*Continuo mostrando la tabla de notas*/
    require "vistas/mostrar_notas.php";

    $_SESSION["nota"]=$nota;

    /*Pruebas para ver qué hay almacenado en la variable*/
    echo "<p>SESSION[id_alumno]: ".$_SESSION["id_alumno"]."</p>";

    echo "<p> SESSION[nombre]: ".$_SESSION["nombre"]."</p>";

    echo "<p> SESSION[nota]: ".$_SESSION["id_asig"]."</p>";

    /*Aquí va el código para borrar la nota del alumno*/

}

?>