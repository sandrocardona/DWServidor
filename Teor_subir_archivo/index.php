<?php
if(isset($_POST["btnEnviar"])){
    $error_archivo=$_FILES["archivo"]["name"]=="" || $_FILES["archivo"]["error"] || !getimagesize($_FILES["archivo"]["tmp_name"]) || $_FILES["archivo"]["size"]>500*1024;
}
if(isset($_POST["btnEnviar"]) && !$error_archivo){
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>

        </style>
    </head>
    <body>
        <h1>Teoría subir ficheros al servidor</h1>
        <h2>Datos del archivo subido</h2>
        <?php
        $nombre_nuevo=md5(uniqid(uniqid(),true));
        $array_nombre=explode(".",$_FILES["archivo"]["name"]);
        $ext="";
        if(count($array_nombre)>1){
            $ext=end($array_nombre);
        }
        $nombre_nuevo.=".".$ext;
        @$var=move_uploaded_file($_FILES["archivo"]["tmp_name"],"images/".$nombre_nuevo);
        if($var){
            echo "<h3>Foto</h3>";
            echo "<p>No se ha podido mver la img a la carpeta destino en el servidor</p>";
            echo "<p><strong>Nombre: </strong>".$_FILES["archivo"]["name"]."</p>";
            echo "<p><strong>Tipo: </strong>".$_FILES["archivo"]["type"]."</p>";
            echo "<p><strong>Tamaño: </strong>".$_FILES["archivo"]["size"]."</p>";
            echo "<p><strong>Error: </strong>".$_FILES["archivo"]["error"]."</p>";
            echo "<p><strong>Ruta del archivo en servidor: </strong>".$_FILES["archivo"]["tmp_name"]."</p>";
            echo "<p>La imagen ha sido subida con éxito</p>";
            echo "<p><img class='tam_imag' src='images/".$nombre_nuevo."' alt='Foto' title='Foto'/></p>";
        }else{
            echo "<p>No se ha podido mver la img a la carpeta destino en el servidor</p>";
        }
        echo "<p>Fin</p>";
        ?>
        
    </body>
    </html>
    <?php
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

                if($_FILES["archivo"]["name"]!="")
                {
                    if($_FILES["archivo"]["error"]){
                        echo "<span class='error'>No se ha podido subir el archivo al servidor</span>";
                    }elseif(!getimagesize($_FILES["archivo"]["tmp_name"])){
                        echo "<span class='error'>No has seleccionado un archivo de tipo imagen</span>";
                    }else{
                        echo "<span class='error'>El archivo supera los 500KB</span>";
                    }
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
