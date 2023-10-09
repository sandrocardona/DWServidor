
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Recogiendo datos</h1>
    <?php
        echo "<p><strong>Nombre: </strong>" .$_POST["nombre"]. "</p>";
        echo "<p><strong>Apellidos: </strong>" .$_POST["apellidos"]. "</p>";
        echo "<p><strong>Contraseña: </strong>" .$_POST["clave"]. "</p>";
        if(isset($_POST["sexo"]))
            echo "<p><strong>Nombre: </strong>" .$_POST["sexo"]. "</p>";
        else
            echo "<p><strong>Sexo: No seleccionado</strong></p>";

        echo "<p><strong>Nacido: </strong>" .$_POST["nacido"]. "</p>";
        echo "<p><strong>Comentarios: </strong>" .$_POST["comentarios"]. "</p>";

        if (isset($_POST["subscripcion"]))
            echo "<p><strong>Subscripcion: </strong>" .$_POST["subscripcion"]. "</p>";
        else
            echo "<p><strong>Subscripcion: No</strong></p>";

        if($_FILES["foto"]["name"]!=""){
            $ext="";
            $array_nombre=explode(".",$_FILES["foto"]["nombre"]);
            if(count($array_nombre)>1){
                $ext=".".end($array_nombre);
            }
            $nombre_nuevo=md5(uniqid(uniqid(),true)).$ext;
            @$var=move_uploaded_file($_FILES["foto"]["tmp_name"], "images/".$nombre_nuevo);
            if($var){
                echo "<h3>Información de la foto</h3>";
                echo "<p><strong>Nombre: </strong>".$_FILES["foto"]["name"]."</p>";
                echo "<p><strong>Tipo: </strong>".$_FILES["foto"]["type"]."</p>";
                echo "<p><strong>Tamaño: </strong>".$_FILES["foto"]["size"]."</p>";
                echo "<p><strong>Error: </strong>".$_FILES["foto"]["error"]."</p>";
            }else{
                echo "<p><strong>Foto:</strong>No se ha podido mover la imagen seleccionada a la carpeta destino</p>";
            }
        }
    ?>
</body>
</html>
