<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <label for="date1">Día</label>
        <select name="date1" id="date1">
            <?php
            for ($i=1; $i < 32; $i++) { 
                echo "<option value=$i>$i</option>";
            }
            ?>
        </select>
        <?php
        if(isset($_POST["calcular"])&& $error_fecha1){
            if($_POST["date1"]=="")
                echo "<span class='error'>Campo vacío</span>";
            else
                echo "<span class='error'>Fecha no valida</span>";
        }
        ?>
        <label for="date2">Mes</label>
        <select name="date2" id="date2">
            <?php
            for ($i=1; $i < 13; $i++) { 
                echo "<option value=$i>$i</option>";
            }
            ?>
        </select>
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
</body>
</html>