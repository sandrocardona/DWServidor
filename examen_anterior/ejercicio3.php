<!-- Control de errores -->
<?php
 if(isset($_POST["btnEnviar"]))
 {
    $error_form=$_POST["texto"]=="";
 }
 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    <style>
        .error{color:red}
    </style>
</head>
<body>
    <form action="ejercicio3.php" method="post">
        <!-- Select separador -->
        <p>
            <label for="sep" id="sep">Elija separador:</label>
            <select name="sep" id="sep">
                <option value=",">, (coma)</option>
                <option value=";">; (punto y coma)</option>
                <option value=".">. (punto)</option>
                <option value=":">: (dos puntos)</option>
            </select>
        </p>
        <!-- Input texto -->
        <p>
        <label for="texto">Introduce un texto:</label>
        <input type="text" name="texto" id="texto" value="<?php if(isset($_POST["texto"])) echo $_POST["texto"]?>">
        </p>   
        <!-- boton enviar -->
        <p>
            <button type="submit" name="btnEnviar" id="btnEnviar">Enviar</button>
        </p>
        <?php
        if(isset($_POST["btnEnviar"]) && $error_form)
        {
            echo "<span class='error'>Introduce un texto</span>";
        }
        ?>
    </form>
    <?php
    if(isset($_POST["btnEnviar"]) && !$error_form)
    {
        echo "<span>funciona</span>";
    }
    ?>
</body>
</html>