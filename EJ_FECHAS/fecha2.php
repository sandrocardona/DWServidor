<?php
if(isset($_POST["calcular"])){
    //compruebo errores
    $error_fecha1=!checkdate($_POST["mes1"],$_POST["dia1"],$_POST["anno1"]);
    $error_fecha2=!checkdate($_POST["mes2"],$_POST["dia2"],$_POST["anno2"]);

    $error_form=$error_fecha1 || $error_fecha2;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fecha 2</title>
    <style>
        .div1{background: lightblue; border: solid; text-align: left}
        .div2{background: lightgreen; border: solid; text-align: left}
        .error{color:red}
    </style>
</head>
<body>
<div class=div1 id=div1>
    <form action="fecha2.php" method="post" enctype="multipart/form-data">
        <br>
        <h4>Introduce una fecha</h4>
        <label for="dia1">Día</label>

        <?php
            $array_mes[1]="Enero";
            $array_mes[2]="Febrero";
            $array_mes[3]="Marzo";
            $array_mes[4]="Abril";
            $array_mes[5]="Mayo";
            $array_mes[6]="Junio";
            $array_mes[7]="Julio";
            $array_mes[8]="Agosto";
            $array_mes[9]="Septiembre";
            $array_mes[10]="Octubre";
            $array_mes[11]="Noviembre";
            $array_mes[12]="Diciembre";

            $anno_actual=date("Y");
            define("N_ANNOS", 50);

        echo '<label for="dia1">Día</label>';
        echo '<select name="dia1" id="dia1">';
            for ($i=1; $i <=31; $i++) {
                if(isset($_POST["calcular"])&& $_POST["dia1"]==$i)
                    echo "<option selected value=$i>".sprintf("%02d", $i)."</option>";
                else 
                    echo "<option value=$i>".sprintf("%02d", $i)."</option>";
            }
        ?>
        </select>
        <label for="mes1">Mes</label>
        <select name="mes1" id="mes1">
            <?php
            for ($i=1; $i < 13; $i++) { 
                if(isset($_POST["calcular"])&& $_POST["mes1"]==$i)
                    echo "<option selected value=$i>".$array_mes[$i]."</option>";
                else 
                    echo "<option value=$i>".$array_mes[$i]."</option>";

            }
            ?>
        </select>
        <label for="anno1">Año</label>
        <select name="anno1" id="anno1">
            <?php
            for ($i=$anno_actual-N_ANNOS; $i <= $anno_actual; $i++) { 
                if(isset($_POST["calcular"])&& $_POST["anno1"]==$i)
                    echo "<option selected value=$i>$i</option>";
                else
                    echo "<option value=$i>$i</option>";
            }
            ?>
        </select>
        <?php
            if(isset($_POST["calcular"])&& $error_fecha1){
                    echo "<span class='error'>Fecha no válida</span>";
            }
        ?>
        <h4>Introduce otra fecha</h4>
        <?php
        echo '<label for="dia2">Día</label>';
        echo '<select name="dia2" id="dia2">';
            for ($i=1; $i <=31; $i++) { 
                if(isset($_POST["calcular"])&& $_POST["dia2"]==$i)
                    echo "<option selected value=$i>".sprintf("%02d", $i)."</option>";
                else 
                    echo "<option value=$i>".sprintf("%02d", $i)."</option>";
            }
        ?>
        </select>
        <label for="mes2">Mes</label>
        <select name="mes2" id="mes2">
            <?php
            for ($i=1; $i < 13; $i++) { 
                if(isset($_POST["calcular"])&& $_POST["mes2"]==$i)
                    echo "<option selected value=$i>".$array_mes[$i]."</option>";
                else 
                    echo "<option value=$i>".$array_mes[$i]."</option>";
            }
            ?>
        </select>
        <label for="anno2">Año</label>
        <select name="anno2" id="anno2">
            <?php
            for ($i=$anno_actual-N_ANNOS; $i <= $anno_actual; $i++) { 
                if(isset($_POST["calcular"])&& $_POST["anno2"]==$i)
                    echo "<option selected value=$i>$i</option>";
                else
                    echo "<option value=$i>$i</option>";
            }
            ?>
        </select>
        <?php
        if(isset($_POST["calcular"])&& $error_fecha2){
                echo "<span class='error'>Fecha no válida</span>";
        }
        ?>
        <br><br>
        <input type="submit" name="calcular" id="calcular" value="Calcular"/>
        <br><br>
    </form>
    </div>
    <?php
    if(isset($_POST["calcular"]) && !$error_form){
        $tiempo1=strtotime($_POST["anno1"]."/".$_POST["mes1"]."/".$_POST["dia1"]);
        $tiempo2=strtotime($_POST["anno2"]."/".$_POST["mes2"]."/".$_POST["dia2"]);

        $dif_segundos=abs($tiempo1-$tiempo2);
        $dias_pasados=$dif_segundos/(60*60*24);

        echo '<div class="div2">';
        echo '<h1>Respuesta</h1>';
        echo '<p>La diferencia en días entre las dos fechas introducidas es de: '.floor($dias_pasados).'</p>';
    }
    ?>
</body>
</html>