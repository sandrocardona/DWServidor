<?php
/*Control de errores*/
if(isset($_POST["btnEnviar"])){
    $error_form=$_POST["texto"]=="";
}
/*Funciones*/
function my_explode($texto){
    $i=0;
    $arr=[];
    while($texto[$i]!=$_POST["opt"]){
        
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    <style>
        .error{color: red}
    </style>
</head>
<body>
    <h1>Ejericio 3</h1>
    <form action="ejercicio3.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="texto">Introduce un texto</label>
            <input type="text" name="texto" id="texto">
            <select name="opt" id="opt">
                <option value=",">coma</option>
                <option value=".">punto</option>
                <option value=";">punto y coma</option>
                <option value=" ">espacio</option>
                <option value=":">dos puntos</option>
            </select>
            <button type="submit" name="btnEnviar" id="btnEnviar">Enviar</button>
            <?php
            if(isset($_POST["btnEnviar"]) && $error_form){
                echo "<p class='error'>Campo vacío</p>";
            }
            ?>
        </p>
    </form>
    <?php
    if(isset($_POST["btnEnviar"]) && !$error_form){
        echo "<p>funciona</p>";
    }
    ?>
</body>
</html>