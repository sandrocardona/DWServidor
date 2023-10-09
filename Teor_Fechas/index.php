<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Teoría de Fechas</h1>
    <?php
        echo "<p>".time()."</p>";
        echo "<p>".date("d/m/y h:i:s")."</p>"; // date("day/month/year hour, minute, second); 

        if(checkdate(2,29,2023)){
            echo "<p>Fecha buena</p>";
        }else{
            echo "<p>Fecha Mala</p>"; //ejemplo: 30 de Febrero
        }
        
        //mktime(hora, minuto, segundo, mes, día, año);
        echo "<p>".date("d/m/y",mktime(0,0,0,9,23,1976))."</p>";

        echo "<p>Segundos: ".strtotime("01/02/1970")."</p>"; // strtotime(m.d.y)

        echo "<p>".floor(6.5)."</p>";
        echo "<p>".ceil(6.5)."</p>";
        echo "<p>".abs(-8)."</p>";

        printf("<p>%.2f</p>",5.6666*7.8888);

        $resultado=sprintf("%.2f", 5.6666*7.8888);
        echo $resultado;
/*         for($i=0; $i<=20; $i++){
            if($i<10){
                echo "<p>0".$i."</p>";
            }else{
                echo "<p>".$i."</p>";
            }

        } */

        for ($i=0; $i < 20; $i++) { 
            echo "<p>".sprintf("%02d",$i)."</p>";
        }
    ?>
</body>
</html>