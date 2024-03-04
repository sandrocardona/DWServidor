<?php
    if(isset($_POST["btnEntrar"])){
        $error_usuario=$_POST["usuario"]=="";
        $error_clave=$_POST["clave"]=="";

        if(!$error_usuario && !$error_clave){
            $url=DIR_SERV."/login";
            $datos_enviados["usuario"]=$_POST["usuario"];
            $datos_enviados["clave"]=md5($_POST["clave"]);
            $respuesta=consumir_servicios_REST($url,"POST", $datos_enviados);
            $obj=json_decode($respuesta);
            if(!$obj){
                session_destroy();
                die(error_page("Error en login","<p>Error al consumir el servicio login: ".$respuesta."</p>"));
            }

            if(isset($obj->error)){
                session_destroy();
                die(error_page("Error en login","<p>Error al consumir el servicio login: ".$obj->error."</p>"));
            }

            if(isset($obj->mensaje)){
                $error_usuario=true;
            } else {
                $_SESSION["usuario"]=$datos_enviados["usuario"];
                $_SESSION["clave"]=$datos_enviados["clave"];
                $_SESSION["ultima_accion"]=time();
                $_SESSION["api_session"]["api_session"]=$obj->api_session;

                header("Location:index.php");

                exit;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Examen SW 22-23 4</title>
        <style>
            .error{color: red;}
        </style>
    </head>
    <body>
        <h1>Examen SW 22-23 4</h1>
        <h2>Gestión de guardias</h2>
        <form action="index.php" method="post">
            <!-- input usuario -->
            <p>
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario" value="<?php if(isset($_POST["usuario"])) echo $_POST["usuario"] ?>">
                <?php
                if(isset($_POST["btnEntrar"]) && $error_usuario){
                    if($_POST["usuario"]=="")
                        echo "<span class='error'>Campo vacío</span>";
                    else
                        echo "<span class='error'>Usuario o contraseña incorrectos</span>";
                }
                ?>
            </p>
            <!-- input contraseña -->
            <p>
                <label for="clave">Clave</label>
                <input type="password" name="clave">
            <?php
                if(isset($_POST["btnEntrar"]) && $error_clave){
                    echo "<span class='error'>Campo vacío</span>";
                }
            ?>
            </p>
            <button name="btnEntrar" type="submit">Entrar</button>
        </form>
    </body>
</html>