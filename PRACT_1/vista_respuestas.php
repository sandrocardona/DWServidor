
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Datos enviados</h1>
    <?php
        echo "<p><strong>Nombre: </strong>".$_POST["nombre"]."</p>";
        echo "<p><strong>Apellidos: </strong>".$_POST["usuario"]."</p>";
        echo "<p><strong>Contraseña: </strong>".$_POST["clave"]."</p>";
        if(isset($_POST["sexo"]))
            echo "<p><strong>Nombre: </strong>".$_POST["sexo"]."</p>";
        else
            echo "<p><strong>Sexo: No seleccionado</strong></p>";

        if (isset($_POST["subscripcion"]))
            echo "<p><strong>Subscripcion: </strong>Subscripción aceptada</p>";
        else
            echo "<p><strong>Subscripcion: </strong>No aceptada</p>";

        if(isset($_POST["btnGuardarCambios"]) && !$error_foto){
            $nombre_unico=md5(uniqid(uniqid(),true));
            $array_nombre=explode(".",$_FILES["foto"]["name"]);
            $ext="";
            if(count($array_nombre)>1){
                $ext=end($array_nombre);
            }
            $nombre_unico.=".".$ext;
            @$var=move_uploaded_file($_FILES["foto"]["tmp_name"],"images/".$nombre_unico);
            if($var){
                echo "<h3>Información de la imagen seleccionada</h3>";
                echo "<p><strong>Error: </strong>".$_FILES["foto"]["error"]."</p>";
                echo "<p><strong>Nombre: </strong>".$_FILES["foto"]["name"]."</p>";
                echo "<p><strong>Ruta del foto en servidor: </strong>".$_FILES["foto"]["tmp_name"]."</p>";
                echo "<p><strong>Tipo: </strong>".$_FILES["foto"]["type"]."</p>";
                echo "<p><strong>Tamaño: </strong>".$_FILES["foto"]["size"]."</p>";
                echo "<p>La imagen ha sido subida con éxito</p>";
                echo "<p><img class='tam_imag' src='images/".$nombre_unico."' alt='Foto' title='Foto'/></p>";
            }else{
                echo "<p><strong>Foto: </strong>No se ha seleccionado ningún archivo</p>";
            }
        }
    ?>
</body>
</html>
