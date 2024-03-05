<?php
if(isset($_POST["btnEntrar"])){
    $error_usuario=$_POST["usuario"]=="";
    $error_clave=$_POST["clave"]=="";

    if(!$error_usuario && !$error_clave){

    }
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
    <h1>Guardias</h1>
    <form action="index.php" method="post">
        <p>
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" value="">
            <?php
            if(isset($_POST["usuario"]) && $error_usuario){
            }
            ?>
        </p>
        <!-- contraseña -->
        <p>
            <label for="clave">Contraseña</label>
            <input type="text" name="clave" value="">
        </p>
        <!-- boton -->
        <button type="submit" name="btnEntrar">Entrar</button>
    </form>
</body>
</html>