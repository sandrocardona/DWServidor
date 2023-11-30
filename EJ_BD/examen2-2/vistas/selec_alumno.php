<?php

try{
    $conexion=mysqli_connect(SERVIDOR,NOMBRE,PWD,BD);
    mysqli_set_charset($conexion,"utf8");
}
catch(Exception $e){
    session_destroy();
    die(error_form("Base vacía","<p>No se ha podido conectar a la base de datos ".$e->getMessage()."</p>"));
}
try{
    $consulta="select * from alumnos";
    $resultado = mysqli_query($conexion,$consulta);
}
catch(Exception $e){
    session_destroy();
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

    /* AL PULSAR btnVerNotas SE MUESTRA ASIGNATURA Y NOTAS DEL ALUMNO */

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
                    $consulta = "SELECT asignaturas.cod_asig, asignaturas.denominacion, notas.notas from asignaturas, notas WHERE asignaturas.cod_asig = notas.cod_asig AND notas.cod_alu = ".$id_alumno.";";
                    $resultado = mysqli_query($conexion,$consulta);
                }
                catch(Exception $e){
                    session_destroy();
                    die(error_form("Consulta","<p>Error al consultar las notas</p>"));
                }

                while($tupla=mysqli_fetch_assoc($resultado)){
                    echo "<tr>";
                    echo "<td>".$tupla["denominacion"]."</td>";
                    echo "<td>".$tupla["notas"]."</td>";
                    echo "<td><form action='index.php' method='post'>";
                    /* BOTON BORRAR NOTA DE ALUMNO */
                        /* quiero borrar la notas.notas de la asignaturas.cod_asig donde he clickado */
                    echo "<input type='hidden' name='id_alumno' value='".$id_alumno."'/><button name='btnBorrar' value='".$tupla["cod_asig"]."' >Borrar</button>&nbsp;&nbsp";
                    /* BOTON EDITAR NOTA DE ALUMNO */
                    echo "<button>Editar</button>";
                    echo "</form></td>";
                    echo "</tr>";
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