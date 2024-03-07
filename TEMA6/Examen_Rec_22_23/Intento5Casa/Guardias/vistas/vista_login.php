<?php
if(isset($_POST["btnLogin"])){
    $error_usuario=$_POST["usuario"]=="";
    $error_clave=$_POST["clave"]=="";

    if(!$error_usuario && !$error_clave){
        $url=DIR_SERV."/login";
        $datos["usuario"]=$_POST["usuario"];
        $datos["clave"]=md5($_POST["clave"]);
        $respuesta=consumir_servicios_REST($url, "POST", $datos);
        $obj_login=json_decode($respuesta);

        if(!$obj_login){
            session_destroy();
            die(error_page("NO OBJ", "OBJ.LOGIN", $respuesta));
        }

        if(isset($obj_login->error)){
            session_destroy();
            die(error_page("ERROR", "ERROR", $obj_login->error));
        }

        if(isset($obj_login->mensaje)){
            $error_usuario=true;
        } else {
            $_SESSION["usuario"]=$datos["usuario"];
            $_SESSION["clave"]=$datos["clave"];
            $_SESSION["ult_accion"]=time();
            $_SESSION["api_session"]=$obj_login->api_session;

            header("Location:index.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    <h1>Gestion de guardias</h1>
    <form action="index.php" method="post">
        <!-- usuario -->
        <p>
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" value="<?php if(isset($_POST["usuario"])) echo $_POST["usuario"] ?>">
            <?php
                if(isset($_POST["btnLogin"]) && $error_usuario){
                    if($_POST["usuario"]==""){
                        echo "<span class='error'>Campo vacío</span>";
                    } else {
                        echo "<span class='error'>Usuario o contarseña incorrectos</span>";
                    }
                }
            ?>
        </p>
        <!-- contraseña -->
        <p>
            <label for="clave">Contraseña</label>
            <input type="password" name="clave">
            <?php
                if(isset($_POST["btnLogin"]) && $error_clave){
                    echo "<span class='error'>Campo vacío</span>";
                }
            ?>
        </p>
        <button type="submit" name="btnLogin">Entrar</button>
    </form>
</body>
</html>