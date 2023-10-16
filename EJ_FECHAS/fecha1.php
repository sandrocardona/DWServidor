<?php

function buenos_separadores($texto){
    return substr($texto,2,1)=="/" && substr($texto,5,1)=="/";
}

function numeros_buenos($texto){
    return is_numeric(substr($texto,0,2)) && is_numeric(substr($texto,3,2)) && is_numeric(substr($texto,6,4));
}

function fecha_valida($texto){
    return checkdate(substr($texto,3,2),substr($texto,0,2),substr($texto,6,4));
}

//Control de errores
if(isset($_POST["calcular"])){
    $error_fecha1=$_POST["date1"]==""||strlen($_POST["date1"])!=10||!buenos_separadores($_POST["date1"])||!numeros_buenos($_POST["date1"])||!fecha_valida($_POST["date1"]);

    $error_fecha2=$_POST["date2"]==""||strlen($_POST["date2"])!=10||!buenos_separadores($_POST["date2"])||!numeros_buenos($_POST["date2"])||!fecha_valida($_POST["date2"]);

    $error_form=$error_fecha1||$error_fecha2;
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fecha_valida 1</title>
    <style>
        .div1{background: lightblue; border: solid; text-align: left}
        .div2{background: lightgreen; border: solid; text-align: left}
        .error{color:red}

    </style>
</head>
<body>
    <div class=div1 id=div1>
    <form action="fecha1.php" method="post" enctype="multipart/form-data">
        <br>
        <label for="date1">Fecha 1</label>
        <input type="text" name="date1" id="date1" placeholder="DD/MM/YYYY" value=<?php if(isset($_POST["date1"])) echo $_POST["date1"]?>>
        <?php
        if(isset($_POST["calcular"])&& $error_fecha1){
            if($_POST["date1"]=="")
                echo "<span class='error'>Campo vacío</span>";
            else
                echo "<span class='error'>Fecha no valida</span>";
        }
        ?>
        <br><br>
        <label for="date2">Fecha 2</label>
        <input type="text" name="date2" id="date2" placeholder="DD/MM/YYYY" value=<?php if(isset($_POST["date2"])) echo $_POST["date2"]?>>
        <?php
        if(isset($_POST["calcular"])&& $error_fecha2){
            if($_POST["date2"]=="")
                echo "<span class='error'>Campo vacío</span>";
            else
                echo "<span class='error'>Fecha no valida</span>";
        }
        ?>
        <br><br>
        <input type="submit" name="calcular" id="calcular" value="Calcular"/>
        <br><br>
    </form>
    </div>
    <?php
    if(isset($_POST["calcular"]) && !$error_form){
        //resuelvo el problema
        $fecha1=explode("/",$_POST["date1"]);
        $fecha2=explode("/",$_POST["date2"]);

        //$tiempo1=mktime(0,0,0,$fecha1[1],$fecha1[0],$fecha1[2]);
        //$tiempo2=mktime(0,0,0,$fecha2[1],$fecha2[0],$fecha2[2]);

        $tiempo1=strtotime($fecha1[2]."/".$fecha1[1]."/".$fecha1[0]);// year/month/day
        $tiempo2=strtotime($fecha2[2]."/".$fecha2[1]."/".$fecha2[0]); // year/month/day


        $dif_segundos=abs($tiempo1 - $tiempo2);
        $dias_pasados=$dif_segundos/(60*60*24);

        echo "<div class='div2'>";
        echo "<h1 class='centro'>Respuesta</h1>";
        echo "<p>La diferencia en días entre las dos fechas introducidas es: ".floor($dias_pasados)."</p>";
        echo "</div>";
    }
    ?>
</body>
</html>