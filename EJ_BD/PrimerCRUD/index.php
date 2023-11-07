<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primer CRUD</title>
    <style>
        table,td,th{border: 1px solid black}
        table{border-collapse:collapse;text-align:center}
        th{background-color:#ccc}
        table img{width:20px}
        .enlace{border:none;background:none;cursor:pointer;color:blue;text-decoration:underline}
    </style>
</head>
<body>
    <h1>Listado de los usuarios</h1>
    <?php
    try{
        $conexion=mysqli_connect("localhost","jose","josefa","bd_foro");
        mysqli_set_charset($conexion,"utf8");
    }
    catch(Exception $e){
        die("<p>No se ha podido conectar a la base:".$e->getMessage()."</p></body></html>");
    }

    try{
        $consulta="select * from usuarios";//string que representa a la consulta
        $resultado=mysqli_query($conexion,$consulta);
    }
    catch(Exception $e){
        mysqli_close($conexion);
        die("<p>No se ha podido realizar la consulta: ".$e->getMessage()."</p></body></html>");
    }

    echo "<table>";
    echo "<tr><th>Nombre</th><th>Borrar</th><th>Editar</th></tr>";
    while($tupla=mysqli_fetch_assoc($resultado)){
        echo "<tr>";
        echo "<td><form action='index.php' method='post'><button title='Detalles del usuario' type='submit' name='btnDetalle' class='enlace' value='".$tupla["id"]."'>".$tupla["nombre"]."</button></form></td>";
        echo "<td><form action='index.php' method='post'><button type='submit'><img src='images/borrar.png' alt='Imagen borrar' title='Borrar usuario'></button></form></td>";
        echo "<td><img src='images/editar.png' alt='Imagen editar' title='Editar usuario'</td>";
        echo "</tr>";
    }
    echo "</table>";

    if(isset($_POST["btnDetalle"])){
        echo "<h3>Detalles del usuario con id: ".$_POST["btnDetalle"]."</h3>";
        try{
            $consulta="select * from usuarios";//string que representa a la consulta
            $resultado=mysqli_query($conexion,$consulta);
        }
        catch(Exception $e){
            mysqli_close($conexion);
            die("<p>No se ha podido realizar la consulta: ".$e->getMessage()."</p></body></html>");
        }
        if(mysqli_num_rows($resultado)>0){
            $datos_usuario=mysqli_fetch_assoc($resultado);

            echo "<p>";
            echo "<strong>Nombre: </strong>".$datos_usuario["nombre"]."<br>";
            echo "<strong>Usuario: </strong>".$datos_usuario["usuario"]."<br>";
            echo "<strong>Email: </strong>".$datos_usuario["mail"]."<br>";
            echo "</p>";
        }
        else{
            echo "<p>El usuario seleccionado ya no se encuentra registrado en la BD</p>";
        }
        echo "<form action='index.php' method='post'>";
        echo "<p><button type='submit'>Volver</button></p>";
        echo "</form>";
    }
    else if(isset($_POST["btnBorrar"])){
        //codigo borrar
    }
    else if(isset($_POST["btnEditar"])){
        //codigo editar
    }
    else{
        echo "<form action='usuario_nuevo.php' method='post'>";
        echo "<p><button type='submit' name='btnNuevoUsuario'>Insertar nuevo usuario</button></p>";
        echo "</form>";
    }
    mysqli_free_result($resultado);//libera memoria
    mysqli_close($conexion);//cierra la conexión
    ?>
</body>
</html>