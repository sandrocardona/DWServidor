<?php
    require "./src/ctes.php";
    session_name("Horarios");
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Examen2 PHP</title>
        <style>
            body{text-align: center;}
            #divtabla{
                display: flex;
                justify-content: center;
                width: 100vw;
                height: auto;
            }
            #tabla{
                width: 80%;
                border: 1px solid black;
                border-collapse: collapse;
            }

            th{
                background-color: lightblue;
            }

            th, tr, td{
                border-collapse: collapse;
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <h1>Examen2 PHP</h1>
        <h2>Horario de los Profesores</h2>
        <form action="index.php" method="post">
            <label for="profesor">Horario del profesor</label>
            <select name="profesor" id="profesor">
                <?php 
                $url=DIR_SERV."/obtener_profesores";
                $respuesta=consumir_servicios_REST($url, "GET");
                $obj=json_decode($respuesta);
                if(!$obj){
                    session_destroy();
                    echo "<p>".$respuesta."</p>";
                }

                if(isset($obj->error)){
                    session_destroy();
                    echo "<p>".$obj->error."</p>";
                }
                echo "<p>".$obj->profesores."</p>";
                foreach ($obj->profesores as $tupla) {
                    if(isset($_POST["profesor"]) && ($_POST["profesor"]==$tupla->id_usuario)){
                        echo "<option selected value='".$tupla->id_usuario."'>".$tupla->nombre."</option>";
                        $datos["id_profesor"]=$tupla->id_usuario;
                        $nombre_profesor=$tupla->nombre;
                    } else 
                        echo "<option value='".$tupla->id_usuario."'>".$tupla->nombre."</option>";
                }

                ?>
            </select>
            <button name="btnVerHorario" type="submit">Ver Horario</button>
            <?php
            if(isset($_POST["profesor"])){

                /* === servicio obtener horarios === */
                $url=DIR_SERV."/obtener_horarios";
                $respuesta=consumir_servicios_REST($url,"POST",$datos);
                $obj2=json_decode($respuesta);
                if(!$obj2){
                    session_destroy();
                    echo "<p>".$respuesta."</p>";
                } 

                if(isset($obj2->error)){
                    session_destroy();
                    echo "<p>".$obj2->error."</p>";
                }

                /* recoger los datos de los horarios del profesor */
                foreach($obj2->horarios as $tupla){
                    if(isset($horarios[$tupla->dia][$tupla->hora]))
                        $horarios[$tupla->dia][$tupla->hora].=" / ".$tupla->nombre;
                    else
                        $horarios[$tupla->dia][$tupla->hora]=$tupla->nombre;
                }

                echo "<h2> Horarios de: <strong>".$nombre_profesor."</strong></h2>";

                $horas[1]="8:15 - 9:15";
                $horas[]="9:15 - 10:15";
                $horas[]="10:15 - 11:15";
                $horas[]="11:15 - 11:45";
                $horas[]="11:45 - 12:45";
                $horas[]="12:45 - 13:45";
                $horas[]="13:45 - 14:45";
                echo "<div id='divtabla'>";
                echo "<table id='tabla'>";
                echo "<tr><th></th><th> LUNES </th><th> MARTES </th><th> MIERCOLES </th><th> JUEVES </th><th> VIERNES </th></tr>"; 
                for ($i=1; $i < 7; $i++) { 
                    echo "<tr>";
                    echo "<th>".$horas[$i]."</th>";
                    if($i==4){
                        echo "<td colspan='5'>RECREO</td>";
                    } else {
                        for ($j=1; $j <= 5; $j++) { 
                            if(isset($horarios[$tupla->dia][$tupla->hora])){
                                echo "<td>".$horarios[$i][$j]."</td>";
                            } else {
                                echo "<td>hola</td>";
                            }
                        }
                    }
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";
            }
            ?>
        </form>
    </body>
</html>