<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Nota de los alumnos</h1>
    <?php

        /* SI NO EXISTE LA CONEXION, ME CONECTO */
        if(isset($conexion)){
            $consulta = "select * from alumnos";
            $resultado = mysqli_query($conexion, $consulta);
        }
        else{
            try{
                $conexion = mysqli_connect(SERVIDOR, NOMBRE, PWD, BD);
                $resultado = mysqli_query($conexion, $consulta);
                mysqli_set_charset($conexion, "utf8");
            }
            catch(Exception $e){
                die("<p>No se ha podido conectar a la base de datos: ".$e->getMessage() ."</p></body></html>");
            }
        }

        /* MUESTRO LA SELECCION DE ALUMNOS */
        if(mysqli_num_rows($resultado)>0){
            /* inicio formulario */
            echo "<form action='index.php' method='post'>";
            echo "<label for='sel'>Selecciona un alumno:</label> &nbsp";
            echo "<select name='alumno' id='alumno'>";
            while($datos_alumno=mysqli_fetch_assoc($resultado)){
                if(isset($_POST["alumno"]) && $_POST["alumno"]==$datos_alumno["cod_alu"]){
                    echo "<option selected value='".$datos_alumno["cod_alu"]."'>".$datos_alumno["nombre"]."</option>";
                    $nombre_alumno=$datos_alumno["nombre"];
                }else
                    echo "<option selected value='".$datos_alumno["cod_alu"]."'>".$datos_alumno["nombre"]."</option>";
            }
            echo "</select>&nbsp";
            echo "<button type='submit' name='btnVerNotas'>ver notas</button>";
            echo "</form>";
            /* fin del formulario */
        }

        /* SI NO EXISTEN ALUMNOS */
        else{
            echo "<p>En estos momentos no tenemos ningún alumno registrado en la BD</p>";
        }
        mysqli_free_result($resultado);
        
    ?>
</body>
</html>