<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 POO</title>
</head>
<body>
    <h1>Ejercicio 3 POO</h1>
    <?php
    require "./class_fruta.php";
    echo "<h2>Información de mis frutas</h2>";
    echo "<p>Frutas creadas hasta el momento: ".Fruta::cuantaFruta()."</p>";
    $pera=new Fruta("verde","mediano");
    echo "<p>Creando una pera...</p>";
    echo "<p>Frutas creadas hasta el momento: ".Fruta::cuantaFruta()."</p>";
    echo "<p>Creando un melon...</p>";
    $melon=new Fruta("amarillo","grande");
    echo "<p>Frutas creadas hasta el momento: ".Fruta::cuantaFruta()."</p>";
    echo "<p>Destruyendo melon...</p>";
    unset($melon);/* esto destruye la variable creada  */
    /* $melon=null //esto también destruye la variable */
    echo "<p>Frutas creadas hasta el momento: ".Fruta::cuantaFruta()."</p>";
    ?>
</body>
</html>