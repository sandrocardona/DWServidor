<?php
    session_start();
    if(isset($_POST["btnBorrarSesion"])){
        session_unset();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Teoría de Sesiones</h1>
    <h2>Datos recibidos:</h2>
    <p>
    <?php
        if(isset($_SESSION["nombre"])){
            echo "<strong>Nombre: </strong>".$_SESSION["nombre"]."<br>";
        }
        else{
            echo "<p>Se han borrado los valores de sesión</p>"; 
        }
    ?>
    </p>
    <p><a href="index.php">Volver</a></p>
</body>
</html>