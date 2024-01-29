<?php
session_name("App_Login_23_24");
session_start();

define("DIR_SERV","http://localhost/Proyectos/DWServidor/TEMA6/Servicios_web/Ejercicio3");

function consumir_servicios_REST($url,$metodo,$datos=null)
{
    $llamada=curl_init();
    curl_setopt($llamada,CURLOPT_URL,$url);
    curl_setopt($llamada,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($llamada,CURLOPT_CUSTOMREQUEST,$metodo);
    if(isset($datos))
        curl_setopt($llamada,CURLOPT_POSTFIELDS,http_build_query($datos));
    $respuesta=curl_exec($llamada);
    curl_close($llamada);
    return $respuesta;
}

function error_page($title, $body){
    $respuesta='
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>'.$title.'</title>
    </head>
    <body>
        '.$body.'
    </body>
    </html>';

    return $respuesta;
}

if(isset($_POST["btnSalir"])){
    session_destroy();
    header("Location:index.php");
    exit;
}

if(isset($_SESSION["usuario"])){

    $datos["usuario"]=$_POST["usuario"];
    $datos["clave"]=md5($_POST["clave"]);
    $url=DIR_SERV."/login";
    $respuesta=consumir_servicios_REST($url, "POST", $datos);
    $obj=json_decode($respuesta);
    if(!$obj){
        session_destroy();
        die(error_page("App Login SW","<h1>App Login SW</h1>".$respuesta));
    }
    if(isset($obj->mensaje_error)){
        session_destroy();
        die(error_page("App Login SW","<h1>App Login SW</h1><p>".$obj->mensaje_error."</p>"));
    }
    
    if(isset($obj->mensaje)){
        session_unset();
        $_SESSION["seguridad"]="Usted ya no se encuentra registrado en la BD (index.php App_Login)";
        header("Location:index.php");
        exit;
    }

    $datos_usuario_log=$obj->usuario;

    if(time()-$_SESSION["ult_accion"]>MINUTOS*60){
        session_unset();
        $_SESSION["seguridad"]="Su tiempo de sesión ha caducado (index.php App_Login)";
        header("Location:index.php");
        exit;
    }

    $_SESSION["ult_accion"]=time();

    if($datos_usuario_log->tipo=="normal"){
        require "vistas/vista_normal.php";
    } else {
        require "vistas/vista_admin.php";
    }


} else {

    if(isset($_POST["btnLogin"])){
        $error_usuario=$_POST["usuario"]=="";
        $error_clave=$_POST["clave"]=="";
        $error_form=$error_usuario || $error_clave;
        if(!$error_form){
            $datos["usuario"]=$_POST["usuario"];
            $datos["clave"]=md5($_POST["clave"]);
            $url=DIR_SERV."/login";
            $respuesta=consumir_servicios_REST($url, "POST", $datos);
            $obj=json_decode($respuesta);
            if(!$obj)
                die(error_page("App Login SW","<h1>App Login SW</h1>".$respuesta));
            if(isset($obj->mensaje_error))
                die(error_page("App Login SW","<h1>App Login SW</h1><p>".$obj->mensaje_error."</p>"));
            if(isset($obj->mensaje))
                $error_usuario=true;
            else{
                $_SESSION["usuario"]=$obj->usuario->usuario;
                $_SESSION["clave"]=$obj->usuario->clave;
                $_SESSION["ult_accion"]=time();
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
    <title>App Login</title>
</head>
<body>
    <h1>App Login SW</h1>
    <form action="index.php" method="post">
        <p>
            <label for="usuario">Usuario: </label>
            <input type="text" name="usuario" id="usuario" value="<?php if(isset($_POST["usuario"])) echo $_POST["usuario"] ?>">
            <?php
            if(isset($_POST["btnLogin"]) && $error_usuario){
                if($_POST["usuario"==""])
                    echo "<span class='error' >Campo vacío</span>";
                else
                    echo "<span class='error' >Usuario/clave no válido</span>";
            }
            ?>
        </p>
        <p>
            <label for="clave">clave: </label>
            <input type="password" name="clave" id="clave" value="">
            <?php
            if(isset($_POST["btnLogin"]) && $error_clave){
                echo "<span class='error' >Campo vacío</span>";
            }
            ?>
        </p>
        <p>
            <button type="submit" name="btnLogin" >Login</button>
        </p>
    </form>
    <?php
    if(isset($_SESSION["seguridad"])){
        echo "<p class='mensaje'>".$_SESSION["seguridad"]."</p>";
        session_destroy(); 
    }
    ?>
</body>
</html>

<?php
}
?>