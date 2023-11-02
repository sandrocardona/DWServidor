<?php
//Control errores
if(isset($_POST["btnCodificar"])){
$error_form=$_POST["texto"]=="" ||
            $_POST["des"]=="" || $_POST["des"]<1 || $_POST["des"]<26
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>
    <h1>Ejercicio 3. Codifica una frase</h1>
    <form action="ejercicio3.php" method="post">
        <p>
            <label for="texto">Introduzca un Texto:</label>
            <input type="text" name="texto" id="texto" value="<?php if(isset($_POST["btnCodificar"])) echo $_POST["texto"] ?>">
            <br><br>
            <label for="des">Desplazamiento</label>
            <input type="text" name="des" id="des" value="<?php if(isset($_POST["btnCodificar"])) echo $_POST["des"] ?>">
            <br><br>
            <button type="submit" name="btnCodificar" id="btnCodificar">Codificar</button>
        </p>
        <?php
        if(isset($_POST["btnCodificar"]) && $error_form){
            echo "<p>error</p>";
        }
        ?> 
    </form>
</body>
</html>