<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 POO</title>
</head>
<body>
    <h1>Ejercicio1 POO</h1>
    <?php
    require "./class_fruta.php";

    $pera=new Fruta();
    $pera->set_color("verde");
    $pera->set_tamanno("mediano");

    echo "<h2>Información de mi fruta pera</h2>";
    echo "<p><strong>Color: </strong>".$pera->get_color()."<br><strong>Tamaño: </strong>".$pera->get_tamanno()."</p>";
    ?>
</body>
</html>