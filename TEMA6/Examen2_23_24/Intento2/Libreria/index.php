<?php
    require "./src/ctes.php";

    if(isset($_POST["btnEnviar"])){
        $error_usuario=$_POST["usuario"]=="";
        $error_clave=$_POST["clave"]=="";
        $error_form=$error_usuario || $error_clave;
    }

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Examen2 PHP</title>
        <style>
            input{display: block;}
            .error{color: red;}
        </style>
    </head>
    <body>
        <h1>Examen2 PHP</h1>
        <form action="index.php" method="post">
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" value="<?php if(isset($_POST["usuario"])) echo $_POST["usuario"] ?>">
            <?php
                if(isset($_POST["btnEnviar"]) && $error_usuario){
                    echo "<span class='error'>campo vacío</span>";
                }
            ?>
        <p>
            <label for="clave">Clave</label>
            <input type="password" name="clave">
            <?php
                if(isset($_POST["btnEnviar"]) && $error_clave){
                    echo "<span class='error'>campo vacío</span>";
                }
            ?>
        </p>
        <button type="submit" name="btnEnviar">Enviar</button>
        </form>

    </body>
</html>