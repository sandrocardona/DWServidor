<?php
require "./src/constantes.php";
session_name("recuperacion22-23");
session_start();

if(isset($_POST["btnEntrar"])){
    $error_usuario=$_POST["usuario"]=="";
    $error_clave=$_POST["clave"]=="";

    $error_form=$error_usuario || $error_clave;
    if(!$error_form){
        $url=DIR_SERV."/login";

        $datos["usuario"]=$_POST["usuario"];
        $datos["clave"]=md5($_POST["clave"]);

        $respuesta=consumir_servicios_REST($url,"POST",$datos);
        $obj_login=json_decode($respuesta);
        if(!$obj_login){

        }

        if(isset($obj_login->error)){

        }

        if(isset($obj_login->mensaje)){
            $error_form=true;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error{color: red;}
    </style>
</head>
<body>
    <h1>Gestión de guardias</h1>
    <div>
        <form action="index.php" method="post">
            <!-- nombre usuario -->
            <p>
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario" value="<?php if(isset($_POST["usuario"])) echo $_POST["usuario"] ?>">
            <?php
                if(isset($_POST["btnEntrar"]) && $error_usuario){
                    echo "<span class='error'>Campo vacío</span>";
                }
            ?>
            </p>
            <!-- contraseña -->
            <p>
                <label for="clave">Constraseña</label>
                <input type="password" name="clave">
            <?php
                if(isset($_POST["btnEntrar"]) && $error_clave){
                    echo "<span class='error'>Campo vacío</span>";
                }
            ?>
            </p>
            <!-- boton Entrar -->
            <button name="btnEntrar">Entrar</button>
        </form>
    </div>
</body>
</html>