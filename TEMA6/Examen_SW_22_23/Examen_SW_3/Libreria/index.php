<?php
require "./src/ctes.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen 3</title>
    <style>
        .parrafo > label{width: 300px; display: block}
        .libros{display: flex; flex-flow: row wrap;}
        .libros > .divFoto{width: 30%; text-align: center; margin: 1%}
        .libros > .divFoto > img{width: 75px; height: auto; margin-top: 10px;}
    </style>
</head>
<body>
    <h1>Librería</h1>
    <form action="index.php" method="post">
    <p class="parrafo">
        <label for="lector">Usuario:</label>
        <input type="text" name="lector">
    </p>
    <p class="parrafo">
        <label for="clave">Contraseña:</label>
        <input type="password" name="clave">
    </p>
    <button type="submit" name="btnEntrar">Entrar</button>
    </form>
    <h2>Listado de los libros</h2>
    <?php
    $url=DIR_SERV."/obtenerLibros";
    $respuesta=consumir_servicios_REST($url, "GET");
    $obj=json_decode($respuesta);

    if(!isset($obj)){
        session_destroy();
        die("<p>".$respuesta."</p>");
    }
    if(isset($obj->error)){
        session_destroy();
        die("<p>".$obj->error."</p>");
    }
    ?>
    <div class="libros">
    <?php
    foreach ($obj->libros as $tupla) {
        echo "<div class='divFoto'>";
        echo "<img src='./images/".$tupla->portada."' alt='".$tupla->titulo."'/>";
        echo "<p>".$tupla->titulo." - ".$tupla->precio." €</p>";
        echo "</div>";
    }
    ?>
    </div>
</body>
</html>
