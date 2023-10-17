<?php
if(isset($_POST["btnEnviar"]))
{
    $error_form=$_POST["num"]=="" || !is_numeric($_POST["num"]) || $_POST["num"]<1 || $_POST["num"]>10;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 Ficheros Texto</title>
    <style>
        .error{color:red}
    </style>
</head>
<body>
<!--    Realizar una web con un formulario que pida un número entero entre 1 y 10,
        lea el fichero tabla_n.txt con la tabla de multiplicar de ese número de la
        carpeta Tablas, done n es el número introducido, y la muestre por pantalla.
        Si el fichero no existe debe mostrar un mensaje informando de ello.     -->

    <h1>Ejercicio 2</h1>
    <form action="EJ_2.php" method="post">
        <p>
            <label for="num">Introduce un número del 1 al 10</label>
            <input type="text" name="num" id="num" value="<?php if(isset($_POST["num"])) echo $_POST["num"];?>">
            <?php
                if(isset($_POST["num"]) && $error_form)
                {
                    if($_POST["num"]=="")
                        echo "<span class='error'>Campo vacío</span>";
                    else
                        echo "<span class='error'>Número incorrecto</span>";
                }
            ?>
        </p>
        <p>
            <button type="submit" name="btnEnviar" id="btnEnviar">Enviar</button>
        </p>
    </form>
    <?php

    if(isset($_POST["btnEnviar"]) && !$error_form)
    {
        $nombre_fichero="tabla_".$_POST["num"].".txt";
        @$fd=fopen("Tablas/".$nombre_fichero, "r");
        if(!$fd)
            echo "<p class='error'>No existe el archivo</p>";
        else
            while($linea=fgets($fd)){
                echo "<p>".$linea."</p>";
            }
    }
    ?>
    
</body>
</html>