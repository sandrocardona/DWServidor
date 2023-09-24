<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recogida datos</title>
</head>
<body>
    <h1>Recogida de datos</h1>
    <?php
    
        echo "<p><strong>Nombre: </strong>".$_POST["name"]."</p>";
        echo "<p><strong>Nacido en: </strong>".$_POST["nacido"]."</p>";
        echo "<p><strong>Sexo:</strong>".$_POST["sexo"]."</p>";


        if(isset($_POST["aficiones"])){
                    echo "<p><strong>Aficiones: si</strong></p>";
        }else{
            echo "<p><strong>No has seleccionado ninguna aficion</strong></p>";
        }

        if($_POST["comentarios"]==""){
            echo "<p><strong>No se ha hecho ningún comentario</strong></p>";
        }else{
            echo "<p><strong>El comentario enviado ha sido:</strong>".$_POST["comentarios"]."</p>";            
        }


    ?>
</body>
</html>