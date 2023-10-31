<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teoría BD</title>
    <style>
        table,th,td{border: 1px solid black;}
        table{border-collapse:collapse; width:80%; margin: auto; text-align: center}
    </style>
</head>
<body>
    <h1>Teoría Base de datos</h1>
    <?php
        //Conectar a base de datos
        try{
            $conexion=mysqli_connect("localhost","jose","josefa","bd_teoria");
            mysqli_set_charset($conexion,"utf8");
        }
        catch(Exception $e){
            die("<p>No se ha podido conectar a la base:".$e->getMessage()."</p></body></html>");
        }

        //Consultas 

        $consulta="select * from t_alumnos";
        try{
            $resultado=mysqli_query($conexion,$consulta);
        }
        catch(Exception $e){
            mysqli_close($conexion); //Hay que desconectar de la base de datos porque la página muere en el die()
            die("<p>No se ha podido realizar la consulta: ".$e->getMessage()."</p></body></html>"); //cerrar body y html al die()
        }

        $n_tuplas=mysqli_num_rows($resultado); //te da el número de filas que ha obtenido
        echo "<p>El número de tuplas obtenida ha sido: ".$n_tuplas."</p>";

        $tupla=mysqli_fetch_assoc($resultado); //Acceder a datos con fetch array asociativo
        //var_dump($tupla); //Obtiene los datos de $tupla
        echo "<p>El primer alumno obtenido tiene le nombre: ".$tupla["nombre"]."</p>";

        $tupla=mysqli_fetch_row($resultado); //Acceder a datos con fetch array escalar
        //var_dump($tupla); //Obtiene los datos de $tupla
        echo "<p>El segundo alumno obtenido tiene le nombre: ".$tupla["1"]."</p>";

        $tupla=mysqli_fetch_array($resultado);
        echo "<p>El tercer alumno obtenido tiene le nombre: ".$tupla["1"]."</p>";
        echo "<p>El tercer alumno obtenido tiene le nombre: ".$tupla["nombre"]."</p>";

        //$tupla=mysqli_fetch_object($resultado);
        //echo "<p>El el cuarto alumno obtenido tiene le nombre: ".$tupla->nombre."</p>";

        mysqli_data_seek($resultado,0); //vuelve a la posición 0

        echo "<table>";
        echo "<tr><th>Código</th><th>Nombre</th><th>Teléfono</th><th>CP</th></tr>";
        while($tupla=mysqli_fetch_assoc($resultado)){
            echo "<tr>";
            echo "<td>".$tupla["cod_alu"]."</td>";
            echo "<td>".$tupla["nombre"]."</td>";
            echo "<td>".$tupla["telefono"]."</td>";
            echo "<td>".$tupla["cp"]."</td>";
            echo "</tr>";
        }
        echo "</table>";

        mysqli_free_result($resultado);

        //Cerrar base de datos
        mysqli_close($conexion);
    ?>
</body>
</html>