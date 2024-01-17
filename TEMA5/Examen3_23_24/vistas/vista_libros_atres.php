<?php
echo "<h3>Listado de los libros</h3>";
        

try{
    $consulta="select * from libros";
    $sentencia=$conexion->prepare($consulta);
    $sentencia->execute();
}
catch(Exception $e)
{
    session_destroy();
    $conexion=null;
    $sentencia=null;
    die("<p>No he podido realizar la consulta: ".$e->getMessage()."</p></body></html>");
}


if($sentencia->rowCount()<=0)
{
    echo "<p>No hay usuarios con esas credenciales en la BD (vista_libros_atres.php)</p>";
}
else {
    while($tupla=$sentencia->fetch(PDO::FETCH_ASSOC)){
        echo "<p class='libros'>";
        echo "<img src='img/".$tupla["portada"]."' alt='imagen libro' title='imagen libro'><br>";
        echo $tupla["titulo"]." - ".$tupla["precio"]."€";
        echo "</p>";
    }
}
?>