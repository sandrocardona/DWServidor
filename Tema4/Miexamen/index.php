<?php
session_name("examen3_22_23");
session_start();

require "./src/constantes.php";

/* errores */

if(isset($_POST["btnEntrar"])){
    $error_user = $_POST["user"]=="";
    $error_pwd = $_POST["pwd"]=="";
    $error_form=$error_user || $error_pwd;
    if(!$error_form)
    {
        /* Conexión a BD */
        try{
            $conexion = mysqli_connect(SERVER,USER,PWD,DB);
            mysqli_set_charset($conexion, "utf8");
        }
        catch(Exception $e){
            die(error_page("No conexion","<p>No se ha podido establecer la conexion: ".$e -> getMessage()."</p>"));
        }
        /* consulta de libros */
        try{
            $query_libros = "select * from libros";
            $libro_result = mysqli_query($conexion, $query_libros);
        }
        catch(Exception $e){
            die(error_page("Query error", "<p>No se ha podido realizar la consulta: ".$e -> getMessage()."</p>"));
            session_destroy();
        }
        /* consulta de usuarios */
        try{
            $query_user = "select * from usuarios";
            $user_result = mysqli_query($conexion, $query_user);
        }
        catch(Exception $e){
            die(error_page("User error","<p>No se ha podido realizar la consulta: ".$e -> getMessage()."</p>"));
            session_destroy();
        }
        /* Variables session */

        if(mysqli_num_rows($user_result)>0){
            $_SESSION["usuario"]=$_POST["user"];
            $_SESSION["clave"]=md5($_POST["pwd"]);
            mysqli_free_result($user_result);
            mysqli_close($conexion);
            header("Location:index.php");
            exit;
        }
        else
        $error_usuario=true;

        mysqli_free_result($user_result);
        mysqli_close($conexion);
    }
}
/* Conexión a BD */
try{
    $conexion = mysqli_connect(SERVER,USER,PWD,DB);
    mysqli_set_charset($conexion, "utf8");
}
catch(Exception $e){
    die(error_page("No conexion","<p>No se ha podido establecer la conexion: ".$e -> getMessage()."</p>"));
}
/* consulta de libros */
try{
    $query_libros = "select * from libros";
    $libro_result = mysqli_query($conexion, $query_libros);
}
catch(Exception $e){
    die(error_page("Query error", "<p>No se ha podido realizar la consulta: ".$e -> getMessage()."</p>"));
    session_destroy();
}
/* consulta de usuarios */
try{
    $query_user = "select * from usuarios";
    $user_result = mysqli_query($conexion, $query_user);
}
catch(Exception $e){
    die(error_page("User error","<p>No se ha podido realizar la consulta: ".$e -> getMessage()."</p>"));
    session_destroy();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librería</title>
    <style>
        .divLibros{display: flex; flex-flow: row;}
        .divEtiqueta{width: 200px;border: 1px solid black;display: flex;flex-direction: column; align-items: center; text-align: center; margin: 10px;}
        .imgPortada{width: 150px; height: auto;}
        .error{color: red;}
    </style>
</head>
<body>
    <h1>Librería</h1>
    <?php
    if(isset($_SESSION["usuario"])){
        echo "<p>Bienvenido: ".$_SESSION["usuario"]." </p>";
    }
    else{
        require "./vistas/vista_login.php";
    }

    ?>
    <h2>Listado de los Libros</h2>
    <div class="divLibros">
        <?php
        while($tupla=mysqli_fetch_assoc($libro_result)){
            echo "<div class='divEtiqueta'>";
            echo "<img class='imgPortada' src='./images/".$tupla["portada"]."' alt='".$tupla["titulo"]."'>";
            echo "<p>".$tupla["titulo"]." - ".$tupla["precio"]."</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>