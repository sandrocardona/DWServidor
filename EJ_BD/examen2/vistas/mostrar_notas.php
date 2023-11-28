<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{border: 1px solid black; border-collapse: collapse; width: 50%; text-align: center;}
        th{border: 1px solid black; background-color: lightblue; text-align: center;}
        td{border: 1px solid black; text-align: center;}
        .link{border: none; background: none; text-decoration: underline; color: blue; cursor: pointer;}
    </style>
</head>
<body>
    <?php
    if(isset($conexion)){
        $consulta="select asignaturas.denominacion, notas.notas from asignaturas, notas where asignaturas.cod_asig = notas.cod_asig and cod_alu = ".$_SESSION["id_alumno"]."";
        $resultado=mysqli_query($conexion, $consulta);
    }
    else{
        try{
            $conexion=mysqli_connect(SERVIDOR, NOMBRE, PWD, BD);
            mysqli_set_charset($conexion, "utf8");
        }
        catch(Exception $e){
            die("<p>No se ha podido conectar a la bd: ".$e->getMessage()."</p></body></html>");
        }
    }
    ?>
    <?php echo "<h1>Notas del alumno: ".$nombre_alumno."</h1>";?>
    <table>
        <tr>
            <th>Asignatura</th>
            <th>Nota</th>
            <th>Acción</th>
        </tr>
        <?php
        while($tupla=mysqli_fetch_assoc($resultado)){
            echo "<tr>";
            echo "<td>".$tupla["denominacion"]."</td>";
            echo "<td>".$tupla["notas"]."</td>";
            echo "<td><form action='index.php' method='post'>";
            echo "<button class='link' type='submit' name='btnBorrar' value='".$_SESSION["id_alumno"]."'>Borrar</button> - ";
            echo "<button class='link' type='submit' name='btnEditar' value='".$_SESSION["id_alumno"]."'>Editar</button>";
            echo "</form></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>