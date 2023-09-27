<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $persona["Nombre"]="Pedro Torres";
    $persona["Direccion"]="C/Mayor, 37";
    $persona["Telefono"]=123456789;

    echo "<p>Nombre: ".$persona["Nombre"]."</p>";
    echo "<p>Direccion: ".$persona["Direccion"]."</p>";
    echo "<p>Telefono: ".$persona["Telefono"]."</p>";
    ?>
</body>
</html>