<?php
require "./src/const.php";

if(isset($_POST["btnEntrar"])){
    $error_lector=$_POST["lector"]=="";
    $error_clave=$_POST["clave"]=="";
    $error_form=$error_clave || $error_lector;

    if(!$error_form){
        
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librería</title>
    <style>
        .divLibros{
            display: flex;
            flex-flow: row wrap;
            text-align: center;
        }

        .divLibros > .libro {
            width: 30%;
        }

        .divLibros > .libro > img {
            width: 150px;
            height: 150px;
        }
    </style>
</head>
<body>
    <h1>Librería</h1>
    <form action="index.php" method="post">
        <p>
        <label for="lector">Usuario: </label>
        <input type="text" id="lector" name="lector">
        </p>
        <p>
        <label for="clave">Contraseña: </label>
        <input type="text" id="clave" name="clave">
        </p>
        <button type="submit" id="btnEntrar" name="btnEntrar">Entrar</button>
    </form>
    <h2>Listado de los libros</h2>
    <?php
    $url=DIR_SER."/obtenerLibros";
    $respuesta=consumir_servicios_REST($url,"GET");
    $obj=json_decode($respuesta);

    if(!$obj){
        session_destroy();
        die("<p>".$respuesta."</p>");
    } 

    if(isset($obj->error)){
        session_destroy();
        die("<p>".$obj->error."</p>");
    }
    ?>
    <div class="divLibros">
    <?php
    foreach($obj->libros as $tupla){
        echo "<div class='libro'>";
        echo "<img src='./images/".$tupla->portada."' alt='".$tupla->titulo."'>";
        echo "<p>".$tupla->titulo." - ".$tupla->precio." €</p>";
        echo "</div>";
    }
    ?>
    </div>
</body>
</html>
