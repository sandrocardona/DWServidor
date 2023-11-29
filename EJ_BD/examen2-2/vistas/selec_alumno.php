<?php

try{
    $conexion=mysqli_connect(SERVIDOR,NOMBRE,PWD,BD);
    mysqli_set_charset($conexion,"utf8");
}
catch(Exception $e){
    die(error_form("Base vacía","<p>No se ha podido conectar a la base de datos ".$e->getMessage()."</p>"));
}
try{
    $consulta="select * from alumnos";
    $resultado = mysqli_query($conexion,$consulta);
}
catch(Exception $e){
    die(error_form("Consulsta fallida","<p>No se ha podido realizar la consulta: ".$e->getMessage()."</p>"));
}

if(mysqli_num_rows($resultado)>0){
    /*Selección de alumnos*/
    echo "<form action='index.php' method='post' enctype='multipart/form-data'>";
    echo "<label for='id_alumno'>Selecciona a un alumno: </label>";
    echo "<select name='id_alumno' id='id_alumno'>";
    while($datos_alumno=mysqli_fetch_assoc($resultado)){
        if(isset($_POST["id_alumno"]) && $_POST["id_alumno"]==$datos_alumno["cod_alu"]){
            echo "<option selected value='".$datos_alumno["cod_alu"]."'>".$datos_alumno["nombre"]."</option>";
            /* nombre del alumno */
            $nombre_alumno=$datos_alumno["nombre"];
            $id_alumno=$_POST["id_alumno"];
        }
        else{
            echo "<option value='".$datos_alumno["cod_alu"]."'>".$datos_alumno["nombre"]."</option>";
        }

    }
    echo "</select>&nbsp";
    echo "<button type='submit' name='btnVerNotas'>Ver Notas</button>";
    echo "</form>";

    /* Al pulsar btnVerNotas se muestra Asignatura y notas del alumno */

    if(isset($_POST["id_alumno"])){
        echo "<h2>Notas del alumno: ".$nombre_alumno."</h2>";
        ?>
        <!-- Muestro la tabla de las notas -->
        <table>
            <tr>
                <th>Asignatura</th>
                <th>Notas</th>
                <th>Accion</th>
            </tr>
            <?php
                try{
                    /* Dame las asignaturas del id alumno y las notas de la asignatura del id alumno */
                    /* cod_asig del cod_alumno y las notas.nota de la cod_asig del cod_alumno */
                    $consulta = "";
                    $resultado = mysqli_query($conexion,$consulta);
                }
                catch(Exception $e){
                    die(error_form("Consulta","<p>Error al consultar las notas</p>"));
                }
            ?>
        </table>

        <?php
    }

    /* nombre de la asignatura, nota */
}
else{
    echo "<p>En estos momentos no tenemos ningún alumno registrado en la BD</p>";
}

?>