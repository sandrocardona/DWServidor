<?php
//Control de errores
if(isset($_POST["calcular"])){
    $buenos_separadores1=substr($_POST["date1"],2,1)=="/" && substr($_POST["date1"],5,1)=="/";
    $array_numeros1=explode("/",$_POST["date1"]);
    $numeros_buenos1=is_numeric($_POST["date1"],0,2) && is_numeric($_POST["date1"],3,2) && is_numeric($_POST["date1"],6,4);
    $fecha_valida=checkdate($array_numeros1[1],$array_numeros1[0],$array_numeros1[2]);
    $error_fecha1=$_POST["date1"]==""||strlen($_POST["date1"])!=10||$error_long1||!$buenos_separadores1||!$numeros_buenos1||!$fecha_valida;

    $buenos_separadores1=substr($_POST["date2"],2,1)=="/" && substr($_POST["date2"],5,1)=="/";
    $array_numeros1=explode("/",$_POST["date2"]);
    $numeros_buenos1=is_numeric($_POST["date2"],0,2) && is_numeric($_POST["date2"],3,2) && is_numeric($_POST["date2"],6,4);
    $fecha_valida=checkdate($array_numeros1[1],$array_numeros1[0],$array_numeros1[2]);
    $error_fecha2=$_POST["date2"]==""||strlen($_POST["date2"])!=10||$error_long1||!$buenos_separadores1||!$numeros_buenos1||!$fecha_valida;

    $error_form=$error_fecha1||$error_fecha2;
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <style>
        .div1{background: lightblue; border: solid; text-align: center}
        .div2{background: lightgreen; border: solid; text-align: center}

    </style>
</head>
<body>
    <div class=div1 id=div1>
    <form action="fecha1.php" method="post" enctype="multipart/form-data">
        <br>
        <label for="date2">Fecha 1</label>
        <input type="text" name="date1" id="date1" placeholder="DD/MM/YYYY" value=<?php if(isset($_POST["date1"])) echo $_POST["date1"]?>>
        <br><br>
        <label for="date2">Fecha 2</label>
        <input type="text" name="date2" id="date2" placeholder="DD/MM/YYYY" value=<?php if(isset($_POST["date2"])) echo $_POST["date2"]?>>
        <br><br>
        <input type="submit" name="calcular" id="calcular" value="Calcular"/>
        <br><br>
    </form>
    </div>
    <?php
    if(isset($_POST["calcular"]) && !$error_form){

    }
    ?>
</body>
</html>