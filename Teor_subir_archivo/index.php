<?php
if(isset($_POST["btnEnviar"])){
    $error_archivo=$_FILES["archivo"]["name"]=="" || $_FILES["archivo"]["error"] || !getimagessize($_FILES["archivo"]["tmp_name"]) || $_FILES["archivo"]["size"]>500*1024;
}
if(isset($_POST["btnEnviar"]) && !$error_archivo){
    echo "contesto con la info dle archivo subido";
}
else{
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teoría subir fichero al servidor</title>
    <style>
        .error{color:red}
    </style>
</head>
<body>
    <h1>Teoría subir fichero al servidor</h1>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="archivo">Seleccione un archivo imagen(Máx 500KB):</label>
            <input type="file" name="archivo" id="archivo" accept="image/*"/>
            <?php
            if(isset($_POST["btnEnviar"]) && $error_archivo){
                if($_FILES["archivo"]["error"]){
                    echo "<span class='error'>No se ha podido subir el archivo al servidor</span>";
                }elseif(!getimagessize($_FILES["archivo"]["tmp_name"])){
                    echo "<span class='error'>No has seleccionado un archivo de tipo imagen</span>";
                }else{
                    echo "<span class='error'>El archivo supera los 500KB</span>";
                }
            }
            ?>
        </p>
        <p>
            <button type="submit" name="btnEnviar">Enviar</button>
        </p>
    </form>
</body>
</html>
<?php
}
?>
