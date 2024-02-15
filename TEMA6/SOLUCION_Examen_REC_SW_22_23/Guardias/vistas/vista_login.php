<?php
if(isset($_POST["btnLogin"]))
{
    $error_usuario=$_POST["usuario"]=="";
    $error_clave=$_POST["clave"]=="";
    if(!$error_usuario && !$error_clave)
    {
        $url=DIR_SERV."/login";
        $datos_env["usuario"]=$_POST["usuario"];
        $datos_env["clave"]=md5($_POST["clave"]);
        $respuesta=consumir_servicios_REST($url,"POST",$datos_env);
        $obj=json_decode($respuesta);
        if(!$obj)
        {
            session_destroy();
            die(error_page("Gestión de Guardias","Gestión de Guardias","Error consumiendo el servicio: ".$url.$respuesta));
        }

        if(isset($obj->error))
        {
            session_destroy();
            die(error_page("Gestión de Guardias","Gestión de Guardias",$obj->error));
        }
        if(isset($obj->mensaje))
            $error_usuario=true;
        else
        {
            $_SESSION["usuario"]=$datos_env["usuario"];
            $_SESSION["clave"]=$datos_env["clave"];
            $_SESSION["ultima_accion"]=time();
            $_SESSION["api_session"]["api_session"]=$obj->api_session;
            
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Guardias</title>
</head>
<body>
    <h1>Gestión de Guardias</h1>
    <form action="index.php" method="post">
        <p>
            <label for="usuario">Usuario: </label>
            <input type="text" name="usuario" id="usuario" value="<?php if(isset($_POST["usuario"])) echo $_POST["usuario"];?>"/>
            <?php
            if(isset($_POST["btnLogin"])&& $error_usuario)
            {
                if($_POST["usuario"]=="")
                    echo "<span class='error'>Campo Vacío</span>";
                else
                    echo "<span class='error'>Usuario y/o Contraseña incorrectos</span>";
            }
            ?>
        </p>
        <p>
            <label for="clave">Contraseña:</label>
            <input type="password" name="clave" id="clave"/>
            <?php
            if(isset($_POST["btnLogin"])&& $error_clave)
                echo "<span class='error'>Campo Vacío</span>";
            ?>
        </p>
        <p><button name="btnLogin">Entrar</button></p>
    </form>
    <?php
    if(isset($_SESSION["seguridad"]))
    {
        echo "<p class='mensaje'>".$_SESSION["seguridad"]."</p>";
        unset($_SESSION["seguridad"]);
    }
    ?>
</body>
</html>