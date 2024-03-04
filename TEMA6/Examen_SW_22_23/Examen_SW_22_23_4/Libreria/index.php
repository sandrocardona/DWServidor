<?php
session_name("Examen_Rec_SW_22_23");
session_start();

require "src/ctes.php";

if(isset($_SESSION["usuario"])){
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h1>Logueado</h1>
        <p>bienvenido <?php echo $_SESSION["usuario"] ?></p>
        <!-- boton salir -->
    </body>
    </html>
    <?php
}  else {
    require "vistas/vista_login.php";
}
?>