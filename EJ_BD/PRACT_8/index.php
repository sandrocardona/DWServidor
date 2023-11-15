<?php
require "src/cts_functions.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,th{border: 1px solid black;border-collapse:collapse;text-align:center}
    </style>
</head>
<body>
    <h1>Práctica 8</h1>
    <h2>Listado de los usuarios</h2>
    <?php
    try{
        $conexion=mysqli_connect("localhost","jose","josefa","bd_cv");
        mysqli_set_charset($conexion, "utf8");
    }
    catch{
        die("<p>No se ha podido conectar a la base de datos: ".$e->getMessage()."</p></body></html>");
    }

    try{
        $consulta="select * from usuarios";
        $resultado=mysqli_query($conexion,$consulta);
    }
    catch{
        mysqli_close($conexion);
        die("<p>No se ha podido conectar a la base de datos: ".$e->getMessage()."</p></body></html>");
    }

    echo "<table>";
    echo "<tr><th>#</th><th>Foto</th><th>Nombre</th><th>Usuario+</th></tr>";
    while($tupla=mysqli_fetch_assoc($resultado)){
        echo "<tr>";
        echo "<td>".$tupla["id_usuario"]."</td><td>".$tupla["foto"]."</td><td>".$tupla["nombre"]."</td><td><button>Usuario+</button></td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>
</html>