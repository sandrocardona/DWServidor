<?php
    if(isset($_POST["btnComprobar"])){
        $error_form=$_POST["texto"]=="";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error{color:red}
    </style>
</head>
<body>
    <!-- Escribe un formulario que diga si se repite o no algún caracter de un String -->
    <h1>Repeticion</h1>
    <form action="ejrepaso1.php" method="post">
        <p>
            <label for="texto">Escribe:</label>
            <input type="text" name="texto">
            <button type="submit" name="btnComprobar">Comprobar</button>
            <?php
            if(isset($_POST["btnComprobar"]) && $_POST["texto"]==""){
                echo "<span class='error'>Campo vacío</span>";
            }
            ?>
        </p>
    </form>
    <?php
        if(isset($_POST["btnComprobar"]) && !$error_form){

        }
    ?>
</body>
</html>