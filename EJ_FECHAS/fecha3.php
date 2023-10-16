<?php
if(isset($_POST["calcular"])){
    $error_fecha1=$_POST["date1"]=="";
    $error_fecha2=$_POST["date2"]=="";

    $error_form=$error_fecha1 || $error_fecha2;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fecha 3</title>
    <style>
        .div1{background: lightblue; border: solid; text-align: left}
        .div2{background: lightgreen; border: solid; text-align: left}
        .error{color:red}
    </style>
</head>
<body>
<div class=div1 id=div1>
    <form action="fecha3.php" method="post" enctype="multipart/form-data">
        <br>
        <label for="date1">Selecciona una fecha</label>
        <input type="date" name="date1" id="date1" placeholder="DD/MM/YYYY" value=<?php if(isset($_POST["date1"])) echo $_POST["date1"]?>>
        <?php
        if(isset($_POST["calcular"])&& $error_fecha1){
                echo "<span class='error'>No has seleccionado una fecha</span>";
        }
        ?>
        <br><br>
        <label for="date2">Selecciona otra fecha</label>
        <input type="date" name="date2" id="date2" placeholder="DD/MM/YYYY" value=<?php if(isset($_POST["date2"])) echo $_POST["date2"]?>>
        <?php
        if(isset($_POST["calcular"])&& $error_fecha2){
                echo "<span class='error'>No has seleccionado una fecha</span>";
        }
        ?>
        <br><br>
        <input type="submit" name="calcular" id="calcular" value="Calcular"/>
        <br><br>
    </form>
    </div>
    <?php
    if(isset($_POST["calcular"]) && !$error_form){
        //resuelvo problema
        $tiempo1=strtotime($_POST["date1"]);
        $tiempo2=strtotime($_POST["date2"]);

        $dif_segundos=abs($tiempo1-$tiempo2);
        $dias_pasados=$dif_segundos/(60*60*24);

        echo '<div class="div2">';
        echo '<h1>Respuesta</h1>';
        echo '<p>La diferencia en días entre las dos fechas introducidas es de: '.floor($dias_pasados).'</p>';
    }
    ?>
</body>
</html>