<?php
    session_name("ejer_01_23_24");
    session_start();
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
    ?>
    <form action="sesiones01_2.php" method="post">
        <p>Escriba su nombre:</p>
        <p>
            <label for="nombre"><strong>Nombre: </strong></label>
            <input type="text" name="nombre" id="nombre">
            <?php
            if(isset($_SESSION["error"])){
                echo "<span class='error'>".$_SESSION["error"]."</span>";
                session_destroy();
            }
            ?>
        </p>
        <p>
            <button type="submit" name="btnSig">Siguiente</button>&nbsp;
            <button type="submit" name="btnBorrar">Borrar</button>
        </p>
    </form>
</body>
</html>