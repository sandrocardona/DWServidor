<?php
require "./src/ctes.php";
session_name("horarios");
session_start();

if(isset($_POST["btnVer"])){

}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Examen2 PHP</title>
        <style>
            .tabla{border: 1px solid black; border-collapse: collapse; text-align: center; width: 90%; margin: 0 auto;}
            th{border: 1px solid black; background-color: lightblue;}
            td{border: 1px solid black;}
            .link{background: none; border: none; color: blue; cursor: pointer;}
        </style>
    </head>
    <body>
        <h1>Examen2 PHP</h1>
        <h2>Horario de los Profesores</h2>
        <form action="index.php" method="post">
        <label for="profesor">Horario del profesor:</label>
        <select name="profesor" id="profesor">
            <?php
                /* ===== datos de los profesores ===== */
                $url=DIR_SERV."/datosProfesor";
                $respuesta=consumir_servicios_REST($url,"GET");
                $obj=json_decode($respuesta);
                if(!$obj){
                    session_destroy();
                    echo "<p>".$respuesta."</p>";
                }
                if(isset($obj->error)){
                    session_destroy();
                    echo "<p>".$obj->error."</p>";
                }

                foreach($obj->profesores as $tupla){
                    if(isset($_POST["profesor"]) && $_POST["profesor"]==$tupla->id_usuario){
                        echo "<option selected value='".$tupla->id_usuario."'>".$tupla->nombre."</option>";
                        $datos["id_profesor"]=$tupla->id_usuario;
                        $nombre_profesor=$tupla->nombre;
                    } else {
                        echo "<option value='".$tupla->id_usuario."'>".$tupla->nombre."</option>";
                    }
                }
            ?>
        </select>
        <button type="submit" name="btnVer">Ver Horario</button>
        </form>
        <?php
        if(isset($_POST["btnVer"]) || isset($_POST["btnEditar"])){
            $url=DIR_SERV."/obtenerHorario";
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

            /* recoger datos del profesor */
            foreach($obj2->horarios as $tupla){
                if(isset($horarios[$tupla->dia][$tupla->hora]))
                    $horarios[$tupla->dia][$tupla->hora].="/".$tupla->nombre;
                else
                    $horarios[$tupla->dia][$tupla->hora]=$tupla->nombre;
            }

            echo "<h2>Horario del prof: ".$nombre_profesor."</h2>";
            $horas[1]="8:15 - 9:15";
            $horas[]="9:15 - 10:15";
            $horas[]="10:15 - 11:15";
            $horas[]="11:15 - 11:45";
            $horas[]="11:45 - 12:45";
            $horas[]="12:45 - 13:45";
            $horas[]="13:45 - 14:45";
            echo "<table class='tabla'>";
            echo "<tr><th></th><th>Lunes</th><th>Martes</th><th>Miercoles</th><th>Jueves</th><th>Viernes</th></tr>";
            for ($i=1; $i <=7 ; $i++) { 
                echo "<tr>";
                echo "<th>".$horas[$i]."</th>";
                if($i==4){
                    echo "<td colspan='5'>RECREO</td>";
                } else {
                    for ($j=1; $j <=5 ; $j++) {
                        if(isset($horarios[$j][$i]))
                            echo "<td>".$horarios[$j][$i]."<form action='index.php' method='post'><button name='btnEditar' class='link'>editar</button></form></td>";
                        else
                            echo "<td><form action='index.php' method='post'><button name='btnEditar' class='link'>editar</button></form></td>";
                    }
                }
                echo "</tr>";
            }
            echo "</table>";
        }

        
        ?>
    </body>
</html>