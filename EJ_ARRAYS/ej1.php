<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numeros Pares</title>
</head>
<body>
<?php
echo "<h1>Ejercicio 1</h1>";

$pares=array();
$n=10;
for($i=0; $i<2*$n; $i+=2){
        array_push($pares, $i);
        echo $pares[$i];
    }
?>

</body>
</html>