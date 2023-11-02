<?php
if(isset($_POST["btnNuevoUsuario"]) || isset($_POST["btnContInsertar"]))
{
    if(isset($_POST["btnContInsertar"])){
        $error_nombre=$_POST["nombre"]=="";
        $error_usuario=$_POST["usuario"]=="";
        $error_pwd=$_POST["pwd"]=="";
        $error_email=$_POST["mail"]=="" || !filter_var($_POST["mail"],FILTER_VALIDATE_EMAIL);
        $error_form=$error_nombre||$error_usuario||$error_pwd||$error_email;
        if(!$error_form){
            
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 1er CRUD</title>
</head>
<body>
    <h1>Nuevo Usuario</h1>
    <form action="usuario_nuevo.php" method="post">
        <!-- NOMBRE -->
        <p>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" maxlength="30" value=""><br>
        </p>
        <!-- USUARIO -->
        <p>
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario" maxlength="20" value=""><br>
        </p>
        <!-- CONTRASEÑA -->
        <p>
        <label for="pwd">Contraseña</label>
        <input type="password" name="pwd" id="pwd" maxlength="15"><br>
        </p>
        <!-- EMAIL -->
        <p>
        <label for="mail">Email</label>
        <input type="email" name="mail" id="mail" maxlength="50" value="">
        </p>
        <!-- BOTONES -->
        <p>
            <button type="submit" name="btnContInsertar">Continuar</button>
            <button type="submit" name="btnVolver">Volver</button>
        </p>
    </form>
</body>
</html>
<?php
}
else{
    header("Location:index.php");
    exit;
}
?>