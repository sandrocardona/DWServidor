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
        echo "<td>".$tupla["nombre"]."</td>";
        echo "<td><img src='images/borrar.png' alt='Imagen borrar' title='Borrar usuario'></td>";
        echo "<td><img src='images/editar.png' alt='Imagen editar' title='Editar usuario'</td>";
        echo "</tr>";
    }
    echo "</table>";

    echo "<form action='usuario_nuevo.php' method='post'>";
    echo "<p><button type='submit' name='btnNuevoUsuario'>Insertar nuevo usuario</button></p>";
    echo "</form>";
    
    mysqli_close($conexion);
    ?>
</body>
</html>