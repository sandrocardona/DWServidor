<?php
if(isset($_POST["btnEnviar"]))
{   
    /* No se ha seleccionado archivo. Error de archivo. Archivo distinto a .txt. Archivo mayor que 1mb.  */

    /*echo $_FILES["archivo"]["type"];  Comprobar el type del archivo*/

    $error_form=$_FILES["archivo"]["name"]=="" || $_FILES["archivo"]["error"] || $_FILES["archivo"]["size"] > 1000*1024 || $_FILES["archivo"]["type"]!="text/plain";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error{color:red}
    </style>
</head>
<body>
    <h1>Ejercicio 2</h1>
    <form action="ejercicio2.php" method="post" enctype=multipart/form-data>
        <p>
            <label for="archivo">Selecciona un archivo (Máximo 1 MB)</label>
            <input type="file" name="archivo" id="archivo">
        </p>
        <p>
            <button type="submit" name="btnEnviar" id="btnEnviar">Enviar</button>
        </p>
        <?php
    if(isset($_POST["btnEnviar"]) && $error_form)
        {
            if($_FILES["archivo"]["name"]=="")
                echo "<span class='error'>*</span>";
            else if($_FILES["archivo"]["error"])
                echo "<span class='error'>Error en la subida del archivo</span>";
            else if($_FILES["archivo"]["size"]>1000*1024)
                echo "<span class='error'>El archivo seleccionado es demasiado grande</span>";
            else if($_FILES["archivo"]["type"]!="text/plain")
                echo "<span class='error'>El archivo debe ser texto</span>";


        }
        ?>
    </form>
    <?php
    if(isset($_POST["btnSubir"]) && !$error_form)
    {
        @$var=move_uploaded_file($_FILES["archivo"]["tmp_name"], "Ficheros/archivo.txt");
        if($var)
            echo "<p>Fichero subido con éxito</p>";
        else
            echo "<p>no se ha podido subir el archivo</p>";

    }
    ?>
</body>
</html>