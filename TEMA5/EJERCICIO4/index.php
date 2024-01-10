<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4 POO</title>
</head>
<body>
    <h1>Ejercicio 4</h1>
    <?php
    require "./class_uva.php";

    $uva=new Uva("verde","pequeña",false);

    echo "<h2>Información de mi uva creada</h2>";
    if($uva->tieneSemilla()){
        echo "<p>La uva creada es ".$uva->get_color().", ".$uva->get_tamanno()." y tiene semilla</p>";
    }
    else{
        echo "<p>La uva creada es ".$uva->get_color().", ".$uva->get_tamanno()." y no tiene semilla</p>";
    }
    ?>
</body>
</html>