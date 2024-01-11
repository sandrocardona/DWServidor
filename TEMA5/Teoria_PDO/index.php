<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teoría PDO</title>
</head>
<body>
    <h1>Teoría PDO</h1>
    <?php
    define("SERVIDOR_BD","localhost");
    define("USUARIO_BD","jose");
    define("CLAVE_BD","josefa");
    define("NOMBRE_BD","bd_foro");
    
 
/*     conexion a base de datos hasta ahora */

/*     try{
        $conexion=mysqli_connect(SERVIDOR_BD,USUARIO_BD,CLAVE_BD,NOMBRE_BD);
        mysqli_set_charset($conexion,"utf8");
    }
    catch(Exception $e){
        die("<p>No se ha podido conectar a la bd: ".$e->getMessage()."</p></body></html>");
    } */


/*     conexion con PDO */

    try{
        $conexion=new PDO("mysql:host=".SERVIDOR_BD.";dbname=".NOMBRE_BD,USUARIO_BD,CLAVE_BD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")); //la sentencia entre paréntesis no hay que memorizarla
    }
    catch(PDOException $e){
        die("<p>No se ha podido conectar a la bd: ".$e->getMessage()."</p></body></html>");
    }
    
    $usuario="msantos";
    $clave=md5("123456");


/* consulta de datos hasta ahora */

/*     echo "<p>Conectado a la base con éxito</p>";


    try{
        $consulta="select * from usuarios where usuario='".$usuario."' and clave ='".$clave."'";
        $resultado=mysqli_query($conexion,$consulta);
    }
    catch(Exception $e){
        die("<p>No se ha podido conectar a la bd: ".$e->getMessage()."</p></body></html>");
    }

    if(mysqli_num_rows($resultado)<=0){
        echo "<p>No hay usuarios con esas credenciales en la BD</p>";
    } else {
        $tupla=mysqli_fetch_assoc($resultado);
        echo "<p>Nombre: ".$tupla["nombre"]." </p>";
    }

    mysqli_free_result($resultado);
    mysqli_close($conexion); */

    /* CONSULTA DE DATOS PDO */

/*     try{
        $consulta="select * from usuarios where usuario=? and clave =?"; //los datos son sustituidos por interrogaciones
        $sentencia=$conexion->prepare($consulta);
        $sentencia->execute([$usuario,$clave]); //al método execute le pasamos un array sustituyendo las interrogaciones por los datos en orden coherente
    }
    catch(PDOException $e){
        $sentencia=null;
        $conexion=null;
        die("<p>error: ".$e->getMessage()."</p></body></html>");
    }

    if($sentencia->rowCount()<=0){
        echo "<p>No hay usuarios con esas credenciales en la BD</p>";
    } else {
        $tupla=$sentencia->fetch(PDO::FETCH_ASSOC); //otras constantes: PDO::FETCH_NUM, PDO::FETCH_OBJECT
        echo "<p>Nombre: ".$tupla["nombre"]." </p>";
    }

    $sentencia=null;
    $conexion=null; */

    ?>
</body>
</html>