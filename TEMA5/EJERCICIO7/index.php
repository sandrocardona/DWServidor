<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7 POO</title>
</head>
<body>
    <h1>Ejercicio 7</h1>
    <?php

    require "./class_pelicula.php";
    $pelicula = new Pelicula("El Padrino", "Francis Ford Coppola", 20.5, true, "2024/12/10"); //mirar clase DataTime php

    if($pelicula->getAlquilada()){

    }
    else{
        
    }
    ?>
</body>
</html>