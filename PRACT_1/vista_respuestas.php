
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
    ?>
</body>
</html>
