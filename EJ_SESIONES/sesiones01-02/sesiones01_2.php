<?php
    session_name("ejer_01_23_24");
    session_start();
    if(isset($_POST["nombre"]) && $_POST["nombre"]!=""){
        $_SESSION["nombre"]=$_POST["nombre"];
    }

    if(isset($_POST["btnBorrar"])){
        session_destroy();
        header("Location:sesiones01_1.php");
        exit;
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesiones 1</title>
    <style>
        .text-centrado{text-align: center;}
    </style>
</head>
<body>
    <h1 class="text-centrado">FORMULARIO NOMBRE 1 (FORMULARIO)</h1>
    <?php
    if(isset($_SESSION["nombre"])){
        echo "<p>Su nombre es: ".$_SESSION["nombre"]."</p>";
    }
    else{
        echo "<p>En la primera página, no has tecleado nada</p>";
    }
    ?>
    <p><a href="sesiones01_1.php">Volver a la página principal</a></p>
</body>
</html>