<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($conexion)){
        $resultado="select asignaturas.denominacion, notas.notas from asignaturas, notas where asignaturas.cod_asig = notas.cod_asig and alumnos.cod_alu = 1";
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
    <h1>Notas del alumno <?php  ?></h1>
    <table>
        <tr>
            <th>Asignatura</th>
            <th>Nota</th>
            <th>Acción</th>
        </tr>
        <?php
        while($tupla=mysqli_fetch_assoc($resultado))
        ?>
    </table>
</body>
</html>