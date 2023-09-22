<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo "<h1>Mi primera página Curso 23-24</h1>";
        $a=8;
        $b=9;
        $c=$a+$b;
        define("PI",3.1415);
        echo "<p>El resultado es ".$c."</p>";
        if(3>$c){
            echo "<p>3 es mayor que ".$c."</p>";
        }
        else if(3==$c){
            echo "<p>3 es igual que ".$c."</p>";
        }
        else{
            echo "<p>3 es menor que ".$c."</p>";
        }

        $d=1;
        switch($d){
            case 1: $c=$a-$b;
            break;
            case 2: $c=$a/$b;
            break;
            case 3: $c=$a*$b;
            break;
            default: $c=$a+$b;
            break;
        }

        echo "<p>El resultado del switch es: " .$c."</p>";

        for ($i=0; $i<8 ; $i++) { 
            echo "<p>$i</p>";
        }

        $i=0;
        while ($i <= 8) {
            echo "<p>Hola ".($i+1)."</p>";
            $i++;
        }
    ?>
</body>
</html>