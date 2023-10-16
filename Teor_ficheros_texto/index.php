<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teoría ficheros de texto</title>
</head>
<body>
    <?php

        //capturar error
        @$fd1=fopen("prueba.txt","r+"); //variable=fopen("ruta archivo","permisos")
        if(!$fd1)
            die("<p>No se ha podido abrir el fichero prueba.txt</p>");
        echo "<h1>Por ahora todo en orden</h1>";

        $linea=fgets($fd1); //fgets coge la línea en la que se encuentra el puntero

        echo "<p>".$linea."</p>";

        $linea=fgets($fd1);

        echo "<p>".$linea."</p>";

        $linea=fgets($fd1);

        echo "<p>".$linea."</p>";

        $linea=fgets($fd1);

        echo "<p>".$linea."</p>";

        fseek($fd1, 0);

        while($linea=fgets($fd1)){      //bucle 
            echo "<p>".$linea."</p>";
        }

        //fputs()
        fwrite($fd1, PHP_EOL."No me deja escribir");


        fclose($fd1);

        //comentario de prueba para commit, push, and pull
    ?>
</body>
</html>