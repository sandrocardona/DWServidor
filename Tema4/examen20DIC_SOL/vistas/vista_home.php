<?php
if(isset($_POST["btnEntrar"])){
    $error_usuario=$_POST["usuario"]=="";
    $error_clave=$_POST["clave"]=="";
    $error_form=$error_clave || $error_usuario;
    if(!$error_form){
        /* no hay errores y compruebo usuario en BD */
        try{
            $consulta="select from usuario where lector='".$_POST["usuario"]."' and clave='".md5($_POST["clave"])."'";
            $resultado=mysqli_query($conexion,$consulta);
        }
        catch(Exception $e){
            session_destroy();
            mysqli_close($conexion);
            die(error_page("Examen3 2023 2024","<h1>Librería</h1><p>No se ha podido conectar a la BD: ".$e -> getMessage()."</p>"));
        }
        
        if(mysqli_num_rows($resultado)>0){
            $_SESSION["usuario"]=$_POST["usuario"];
            $_SESSION["clave"]=md5($_POST["clave"]);
            $_SESSION["ultima_accion"]=time();
            $datos_usu_log=mysqli_fetch_assoc($resultado);
            mysqli_close($conexion);

            if($datos_usu_log["tipo"]=="normal"){
                header ("Location:index.php");
            }else{
                header ("Location:admin/gest_libros.php");
            }

            exit();

        } else {
            $error_usuario=true;
        }
        mysqli_free_result($resultado);
    } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>solucion examen librería</title>
    <style>
        .divLibros{display: flex; flex-flow: row;}
        .divEtiqueta{width: 200px;border: 1px solid black;display: flex;flex-direction: column; align-items: center; text-align: center; margin: 10px;}
        img{height: 150px;}
        .error{color: red;}
    </style>
</head>
<body>
    <h1>librería</h1>
    <form action="index.php" method="post">
        <p>
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" id="usuario" value="<?php if(isset($_POST["usuario"])) echo $_POST["usuario"];?>">
            <?php
            if(isset($_POST["usuario"])&& $error_usuario){
                if($_POST["usuario"]==""){
                    echo "<span class='error'>Campo vacío</span>";
                } else {
                    echo "<span class='error'>Clave incorrecta</span>";
                }
            }
            ?>
        </p>
        <p>
            <label for="clave">Clave:</label>
            <input type="password" name="clave" id="clave" value="">
        </p>
        <p>
            <button type="submit" name="btnEntrar">Entrar</button>
        </p>
    </form>
    <?php
    if(isset($_SESSION["seguridad"])){
        echo "<p class='mensaje'>".$_SESSION["seguridad"]."</p>";
        session_destroy();
    }

    echo "<h3>Listado de los libros</h3>";
    try{
        $resultado=mysqli_query($conexion,"select * from libros");
    }
    catch(Exception $e){
        session_destroy();
        mysqli_close($conexion);
        die(error_page("Examen3 2023 2024","<p>No se ha podido realizar la consulta: ".$e -> getMessage()."</p>"));
    }
    while($tupla=mysqli_fetch_assoc($resultado)){
        echo "<div class='divEtiqueta'>";
        echo "<img src='images/".$tupla["portada"]."' alt='imagen libro' title='imagen libro'><br>";
        echo $tupla["titulo"]." - ".$tupla["precio"]."€";
        echo "</div>";
    }
    mysqli_free_result($resultado);
    ?>
</body>
</html>