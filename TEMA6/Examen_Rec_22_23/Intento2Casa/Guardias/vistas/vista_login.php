<?php
if(isset($_POST["btnEntrar"])){
    $error_usuario=$_POST["usuario"]=="";
    $error_clave=$_POST["clave"]=="";

    if(!$error_usuario && !$error_clave){
        $url=DIR_SERV."/login";
        $datos["usuario"]=$_POST["usuario"];
        $datos["clave"]=md5($_POST["clave"]);
        $respuesta=consumir_servicios_REST($url,"POST",$datos);
        $obj_login=json_decode($respuesta);

        if(!$obj_login){
            session_destroy();
            die(error_page("NO OBJ", "Error en objeto", $respuesta));
        }

        if(isset($obj_login->error)){
            session_destroy();
            die(error_page("ERROR", "Error en login", $respuesta));
        }

        if(isset($obj_login->mensaje)){
            $error_usuario=true;
        } else {
            $_SESSION["usuario"]=$datos["usuario"];
            $_SESSION["clave"]=$datos["clave"];
            $_SESSION["ult_accion"]=time();
            $_SESSION["api_session"]["api_session"]=$obj_login->api_session;

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
    <title>Document</title>
    <style>
        .error{color: red;}
    </style>
</head>
<body>
    <h1>Guardias</h1>
    <form action="index.php" method="post">
        <p>
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" value="">
            <?php
                if(isset($_POST["btnEntrar"]) && $error_usuario){
                    echo "<span class='error'>Campo vacío</span>";
                }
            ?>
        </p>
        <!-- contraseña -->
        <p>
            <label for="clave">Contraseña</label>
            <input type="text" name="clave" value="">
            <?php
                if(isset($_POST["btnEntrar"]) && $error_clave){
                    echo "<span class='error'>Campo vacío</span>";
                }
            ?>
        </p>
        <!-- boton -->
        <button type="submit" name="btnEntrar">Entrar</button>
    </form>
</body>
</html>