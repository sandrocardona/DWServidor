<?php
/* Control de errores */
if(isset($_POST["btnEnviar"])){
    $error_form=$_POST["texto"]=="";
}

/*Función contar caracteres*/
function my_strlen($texto){
    $contador=0;
    while(isset($texto[$contador])){
        $contador++;
    }
    return $contador;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <style>
        .error{color:red}
    </style>
</head>
<body>
    <h1>Ejercicio 1</h1>
    <form action="ejercicio1.php" method="post">
        <label for="texto">Introduce un texto:</label>
        <input type="text" name="texto" id="texto" value="<?php if(isset($_POST["btnEnviar"])) echo $_POST["texto"]?>">

        <button type="submit" name="btnEnviar" id="btnEnviar">Enviar</button>
        <?php
        if(isset($_POST["btnEnviar"]) && $error_form){
            echo "<span class='error'>Introduce un texto</span>";
        }
        ?>
    </form>
    <?php
    if(isset($_POST["btnEnviar"]) && !$error_form){
        echo "<p>El texto tiene un total de: ".my_strlen($_POST["texto"])." caracteres</p>";
    }
    ?>
</body>
</html>