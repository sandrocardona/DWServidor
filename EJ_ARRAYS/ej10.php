<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $n=array();
    $sum=0;
    $con=0;
    for($i=0; $i<10; $i++){
        array_push($n, $i);
    }
    for ($i=0; $i <count($n); $i++) { 
        echo "<p>".$n[$i]."</p>";
    }

    foreach ($n as $indice => $value) {
        if($indice%2==0){
            $sum+=$value;
            $con++;
        }else{
            echo $value." ";
        }
    }

    $resultado=$sum/$con;

    echo "<p>".$resultado."</p>";

    ?>
</body>
</html>