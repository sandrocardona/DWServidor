<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>
    <?php
    $meses=array("enero"=>9,"febrero"=>12,"marzo"=>0,"abril"=>17);
    foreach ($meses as $indice => $value) {
        if($value>0){
            echo "<p>$indice</p>";
        }
    }
    ?>
</body>
</html>