<?php
/* session_destroy(); */
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista examen</title>
    <style>
        table{
            width: 80vw;
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
        }
        th,tr,td{
            border: 1px solid black;
            border-collapse: collapse;
        }
        th{
            background-color: grey;
        }
        .enlace{
            border: none;
            background: none;
            text-decoration: underline;
            color: blue;
        }
    </style>
</head>
<body>
    <h1>Gestión de Guardias</h1>
    <p>Bienvenido <?php echo $datos_log->usuario?></p>
    <form action="index.php" method="post"><button name="btnSalir">Salir</button></form>
    <!-- tabla -->
    <h2>Equipos de Guardia</h2>
    <table id="tabla">
    <tr>
        <th></th>
        <th>Lunes</th>
        <th>Martes</th>
        <th>Miércoles</th>
        <th>Jueves</th>
        <th>Viernes</th>
    </tr>
    <?php
    $cont=1;
    for($horas=1; $horas<=7; $horas++){
        echo "<tr>";
            if($horas==4){
                echo "<td colspan='6'>RECREO</td>";
            } else {
                if($horas <= 3){
                    echo "<td>".$horas."º Hora</td>";
                } else {
                    echo "<td>".($horas - 1)."º Hora</td>";
                }
                for ($dias=1; $dias <= 5 ; $dias++) { 
                    echo "<td>";
                    echo "<form action='index.php' method='post'>";
                    echo "<input type='hidden' name='dia' value='".$dias."'/>";
                    echo "<input type='hidden' name='hora' value='".$horas."'/>";
                    echo "<input type='hidden' name='equipo' value='".$cont."'>";
                    echo "<button class='enlace' name='btnVerEquipo'>Equipo ".$cont."</button>";
                    echo "</form>";
                    echo "</td>";
                    $cont++;
                }
            }
        echo "</tr>";
    }
    ?>
    </table>
    <?php
    if(isset($_POST["btnVerEquipo"])){
        echo "<p>".$_POST["dia"]." - ".$_POST["hora"]." - ".$_POST["equipo"]."</p>";
    }
    ?>
</body>
</html>