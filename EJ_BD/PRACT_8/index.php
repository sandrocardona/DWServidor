<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,th,tr,td{border: 1px solid black;border-collapse:collapse;text-align:center}
        table{border-collapse:collapse;text-align:center}
        th{width:200px}
        img{width:50px; height: 50px}
    </style>
</head>
<body>
    <h1>Práctica 8</h1>
    
    <?php
    try{
/*         $conexion=mysqli_connect("localhost","jose","josefa","bd_cv"); */
        $conexion=mysqli_connect("localhost","root","","clientes_php");

        mysqli_set_charset($conexion, "utf8");
    }
    catch(Exception $e){
        die("<p>No se ha podido conectar a la base de datos: ".$e->getMessage()."</p></body></html>");
    }

    try{
        $consulta="select * from usuarios";
        $resultado=mysqli_query($conexion,$consulta);
    }
    catch(Exception $e){
        mysqli_close($conexion);
        die("<p>No se ha podido conectar a la base de datos: ".$e->getMessage()."</p></body></html>");
    }
    echo "<button>Añadir nuevo usuario</button>";
    echo "<h2>Listado de los usuarios</h2>";
    echo "<table>";
    echo "<tr><th>#</th><th>Foto</th><th>Nombre</th><th>Usuario+</th></tr>";
    while($tupla=mysqli_fetch_assoc($resultado)){
        echo "<tr>";
        echo "<td>".$tupla["id_usuario"]."</td><td><img src='./img/".$tupla["foto"]."'></img></td><td>".$tupla["nombre"]."</td><td><button>Borrar</button> - <button>Editar</button></td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>
</html>