<?php
require "./funciones.php";
//Control de errores
if(isset($_POST["btnNuevoUsuario"]) || isset($_POST["btnContInsertar"]))
{
    if(isset($_POST["btnContInsertar"])){
        $error_nombre=$_POST["nombre"]==""||strlen($_POST["nombre"]>30);
        $error_usuario=$_POST["usuario"]==""||strlen($_POST["usuario"]>20);
        if(!$error_usuario){
            //Conexión a la BBDD
            try{
                $conexion=mysqli_connect("localhost","jose","josefa","bd_foro");
                mysqli_set_charset($conexion,"utf8");
            }
            catch(Exception $e){//Si no puedo conectarme, creo la página web completa
                die(error_page("Práctica 1er CRUD","<h1>Práctica 1er CRUD</h1><p>No se ha podido conectar a la base:".$e->getMessage()."</p>"));
            }

            try{
                $consulta="select * from usuarios where usuario='".$_POST["usuario"]."'";//string que representa a la consulta
                $resultado=mysqli_query($conexion,$consulta);
            }
            catch(Exception $e){
                die(error_page("Práctica 1er CRUD","<h1>Práctica 1er CRUD</h1><p>No se ha podido conectar a la base:".$e->getMessage()."</p>"));
            }
            $error_usuario=repetido($conexion, "usuarios","usuario",$_POST["usuario"]);
            if(is_string($error_usuario)){
                die($error_usuario);
            } 
        }
        $error_pwd=$_POST["pwd"]==""||strlen($_POST["pwd"]>15);
        $error_email=$_POST["mail"]==""|| strlen($_POST["mail"]>50)||!filter_var($_POST["mail"],FILTER_VALIDATE_EMAIL);
        if(!$error_email){
            if(!isset($conexion)){
                try{
                    $conexion=mysqli_connect("localhost","jose","josefa","bd_foro");
                    mysqli_set_charset($conexion,"utf8");
                }
                catch(Exception $e){//Si no puedo conectarme, creo la página web completa
                    die(error_page("Práctica 1er CRUD","<h1>Práctica 1er CRUD</h1><p>No se ha podido conectar a la base:".$e->getMessage()."</p>"));
                }
            }
            try{
                $consulta="select * from usuarios where email='".$_POST["mail"]."'";//string que representa a la consulta
                $resultado=mysqli_query($conexion,$consulta);
            }
            catch(Exception $e){
                mysqli_close($conexion);
                die(error_page("Práctica 1er CRUD","<h1>Práctica 1er CRUD</h1><p>No se ha podido conectar a la base:".$e->getMessage()."</p>"));
            }

            $error_email=repetido($conexion, "usuarios","usuario",$_POST["mail"]);
            if(is_string($error_email))
                die($error_email);
        }
        $error_form=$error_nombre||$error_usuario||$error_pwd||$error_email;
        if(!$error_form){
        //inserto en BD y salto a index.pxp
        try{
            $consulta="insert into usuarios (nombre,usuario,clave,email) values ('".$_POST["nombre"]."','".$_POST["usuario"]."','".md5($_POST["pwd"])."','".$_POST["mail"]."')";
            mysqli_query($conexion,$consulta);
        }
        catch(Exception $e){
            mysqli_close($conexion);
            die(error_page("Práctica 1er CRUD","<h1>Práctica 1er CRUD</h1><p>No se ha podido conectar a la base:".$e->getMessage()."</p>"));
        }
        msqli_close($conexion);
        header("Location:index.php");
        exit;//sale del if
        }
        //Si hay errores en el formulario, cierro conexion
        if(isset($conexion)){
            mysqli_close($conexion);
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 1er CRUD</title>
    <style>
        .error{color:red}
    </style>
</head>
<body>
    <h1>Nuevo Usuario</h1>
    <form action="usuario_nuevo.php" method="post">
        <!-- NOMBRE -->
        <p>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" maxlength="30" value="<?php if(isset($_POST["nombre"])) echo $_POST["nombre"]?>">
        <?php
        if(isset($_POST["btnContInsertar"])&& $error_form){
            if($_POST["nombre"]=="")
                echo "<span class='error'>Campo vacío</span>";
            else
                "echo <span class='error'>has tecleado más de 30 caracteres</span>";
        }
        ?>
        </p>
        <!-- USUARIO -->
        <p>
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario" maxlength="20" value="<?php if(isset($_POST["usuario"])) echo $_POST["usuario"]?>">
        <?php
        if(isset($_POST["btnContInsertar"])&& $error_nombre){
            if($_POST["usuario"]=="")
                echo "<span class='error'>Campo vacío</span>";
            else if(strlen($_POST["usuario"])>30)
                "echo <span class='error'>has tecleado más de 20 caracteres</span>";
            else
                echo "<span class='error'>Usuario repetido</span>";

        }
        ?>
        </p>
        <!-- CONTRASEÑA -->
        <p>
        <label for="pwd">Contraseña</label>
        <input type="password" name="pwd" id="pwd" maxlength="15">
        <?php
        if(isset($_POST["btnContInsertar"])&& $error_pwd){
            if($_POST["pwd"]=="")
                echo "<span class='error'>Campo vacío</span>";
            else
                "echo <span class='error'>has tecleado más de 15 caracteres</span>";
        }
        ?>
        </p>
        <!-- EMAIL -->
        <p>
        <label for="mail">Email</label>
        <input type="email" name="mail" id="mail" maxlength="50" value="<?php if(isset($_POST["mail"])) echo $_POST["mail"]?>">
        <?php
        if(isset($_POST["btnContInsertar"])&& !$error_email){
            if($_POST["mail"]=="")
                echo "<span class='error'>Campo vacío</span>";
            else if($_POST["mail"]>50)
                echo "<span class='error'>has tecleado más de 30 caracteres</span>";
            elseif(!filter_var($_POST["mail"],FILTER_VALIDATE_EMAIL))
                echo "<span class='error'>Email sintácticamente incorrecto</span>";
            else
                echo "<span class='error'>Email repetido</span>";
        }
        ?>
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