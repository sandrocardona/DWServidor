<?php
if(isset($_POST["btnContar"])){
    echo "<h1>".$_FILES["fichero"]["type"]."</h1>";
    $error_form=$_FILES["fichero"]["name"]=="" || $_FILES["fichero"]["error"] || $_FILES["fichero"]["type"]!="text/plane" || $_FILES["fichero"]["size"]>2500*1024;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4 Ficheros de Texto</title>
    <style>
        table {
            width: 90%;
            margin: 0 auto;
            text-align: center;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1>Ejercicio 4</h1>
    <form action="EJ_4.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="fichero">Seleccione un fichero de texto para contar sus palabras (máx. 2'5MB):</label>
            <input type="file" name="fichero" id="fichero" accept=".txt">
            <?php
            if(isset($_POST["btnContar"]) && $error_form){
                if($_FILES["fichero"]["name"]=="")
                    echo "<span class='error'>*</span>";
                else if($_FILES["fichero"]["error"])
                    echo "<span class='error'>No se ha podido subir el fichero al servidor</span>";
                elseif ($_FILES["fichero"]["type"]!="text/plain")
                    echo "<span class='error'>No has seleccionado un fichero</span>";
                else
                    echo "<span class='error'>tamaño supera 2.5MB</span>";
            }
            ?>
        </p>
        <p>
            <button type="submit" name="btnContar">Contar palabras</button>
        </p>
    </form>
    <?php
    if(isset($_POST["btnContar"]) && !$error_form){
        //contenido_fichero=file_get_contents($_FILES["fichero"]["tmp_name"]);
        @$fd=fopen($_FILES["fichero"]["tmp_name"], "r");
        if(!$fd)
            die("<h3>No se puede abrir el fichero subido al servidor</h3>");
        $n_palabras=0;
        while($linea=fgets($fd)){
            $n_palabras+=str_word_count($linea);
        }
        echo "<h3>El núm de palabras que contiene el archivo seleccionado es de: ".str_word_count($contenido_fichero);
    }
    ?>
</body>
</html>