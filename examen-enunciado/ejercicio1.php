<?php
/*Funciones*/
function first(){
    
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
    <h1>Ejercicio 1. Generador de "claves_polybios.txt"</h1>
    <form action="ejercicio1.php" method="post">
    <button type="submit" name="btnEnviar" id="btnEnviar">Generar</button>
    </form>
    <?php
    if(isset($_POST["btnEnviar"])){
        echo "<p>Pulsado</p>";
    }
    ?>
</body>
</html>