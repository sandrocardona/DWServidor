<?php
session_name("examen2");
session_start();

require "./vistas/constantes.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{border: 1px solid black;border-collapse: collapse; width: 75%; text-align: center;}
        th{background-color: lightblue;border: 1px solid black; border-collapse: collapse; text-align: center;}
    </style>
</head>
<body>
    <h1>Nota de los alumnos</h1>
    <?php
        require "./vistas/selec_alumno.php";
    ?>
</body>
</html>