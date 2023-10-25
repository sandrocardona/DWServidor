<?php
/*Control errores*/
if(isset($_POST["btnEnviar"])){    
    
    /*echo $_FILES["archivo"]["type"]; Comprobar el type del archivo*/

    $error_form=$_FILES["archivo"]["name"]=="" || $_FILES["archivo"]["error"] || $_FILES["archivo"]["type"]!="text/plain" || $_FILES["archivo"]["size"]>1000*1024;
    
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <style>
        .error{color: red}
    </style>
</head>
<body>
    <h1>Ejercicio 2</h1>
    <form action="ejercicio2.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="archivo">Selecciona un archivo: (Máximo 1MB)</label>
            <input type="file" name="archivo" id="archivo">
        </p>
        <p>
            <button type="submit" name="btnEnviar" id="btnEnviar">Subir archivo</button>
        </p>
        <?php
        if(isset($_POST["btnEnviar"]) && $error_form){
            if($_FILES["archivo"]["name"]=="")
                echo "<p class='error'>No has seleccionado ningún archivo</p>";
            else if($_FILES["archivo"]["error"])
                echo "<p class='error'>No se ha podido subir el archivo</p>";
            else if($_FILES["archivo"]["type"]!="text/plain")
                echo "<p class='error'>Elige un archivo de texto</p>";
            else if($_FILES["archivo"]["size"]>1000*1024)
                echo "<p class='error'>Archivo demasiado pesado (Máx 1MB)</p>";
        }
        ?>
        </form>
        <?php
        if(isset($_POST["btnEnviar"]) && !$error_form){
            @$var=move_uploaded_file($_FILES["archivo"]["tmp_name"], "Ficheros/archivo.txt");
                if($var)
                    echo "<p>Subido con exito</p>";
                else
                    echo "<p>error</p>";
        }
        ?>
</body>
</html>