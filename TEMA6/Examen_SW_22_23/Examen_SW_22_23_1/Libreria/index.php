<?php
session_name("Examen_SW_1");
session_start();

require "./src/ctes.php";

/* Errores */
if(isset($_POST["btnEntrar"])){
    $error_usuario=$_POST["usuario"]=="";
    $error_clave=$_POST["clave"]=="";

    $error_form=$error_usuario || $error_clave;
    /* consumir el servicio */
    if(!$error_form){
        $datos["lector"]=$_POST["usuario"];
        $datos["clave"]=md5($_POST["clave"]);
        $url=DIR_SERV."/login";
        $respuesta=consumir_servicios_REST($url,"POST", $datos);
        $obj=json_decode($respuesta);
        if(!$obj){
            session_destroy();
            die(error_page("Error", $respuesta." en index.php librería"));
        }

        if(isset($obj->error)){
            session_destroy();
            die(error_page("Error", $obj->error." en index.php librería"));
        }

        if(isset($obj->mensaje)){
            session_destroy();
            $error_usuario=true;
        }
    }

    $_SESSION["lector"]=$_POST["usuario"];
    $_SESSION["clave"]=$datos["clave"];
    $_SESSION["ult_accion"]=time();
    $_SESSION["token"]=$obj->api_session;
    header("Location:index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXAMEN SW 1</title>
    <style>
        .error{color: red;}
    </style>
</head>
<body>
    <h1>Librería</h1>
    <div>
        <form action="index.php" method="post">
        <p>
            <label for="usuario">Usuario: </label>
            <input type="text" id="usuario" name="usuario" value="<?php if(isset($_POST["usuario"])) echo $_POST["usuario"] ?>">
            <?php
            if(isset($_POST["btnEntrar"]) && $error_usuario){
                if($_POST["usuario"]=="")
                    echo "<span class='error'>Campo vacío</span>";
                else
                    echo "<span class='error'>Usuario o pwd incorrecto</span>";
            }
            ?>
        </p>
        <p>
            <label for="clave">Contraseña: </label>
            <input type="password" id="clave" name="clave">
            <?php
            if(isset($_POST["btnEntrar"]) && $error_clave){
                echo "<span class='error'>Campo vacío</span>";
            }
            ?>
        </p>
        <button type="submit" id="btnEntrar" name="btnEntrar">Entrar</button>
        </form>
    </div>
    <div>
        <h2>Listado de libros</h2>
        <?php
        $url=DIR_SERV."/obtenerLibros";
        $respuesta=consumir_servicios_REST($url,"GET");
        $obj=json_decode($respuesta);
        if(!$obj){
            session_destroy();
            die("<p>".$respuesta."</p>");
        }

        if(isset($obj->error)){
            session_destroy();
            die("<p>".$obj->error."</p>");
        }

        foreach ($obj->libros as $tupla) {
            echo "<div class='divLibros'>";
            echo "<img src='./images/".$tupla->portada."' alt='$tupla->titulo'></img>";
            echo "<p>".$tupla->titulo." - ".$tupla->precio."</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
