<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $familias["Los Simpsons"]["Padre"]="Homer";
    $familias["Los Simpsons"]["Madre"]="Marge";
    $familias["Los Simpsons"]["Hijos"]="Bart";
    $familias["Los Simpsons"]["Hijos"]="Lisa";
    $familias["Los Simpsons"]["Hijos"]="Maggie";
    $familias["Los Griffin"]["Padre"]="Peter";
    $familias["Los Griffin"]["Madre"]="Lois";
    $familias["Los Griffin"]["Hijos"]="Chris";
    $familias["Los Griffin"]["Hijos"]="Meg";
    $familias["Los Griffin"]["Hijos"]="Stewie";

    echo "<ul>";
    foreach($familias as $familia => $valores){
        echo "<li>".$familia;
        echo "<ul>";
        foreach($valores as $parentesco=>$nombres){
            if($parentesco=="Hijos"){
                echo "<li>".$parentesco.":";
                echo "<ul>";
                foreach($nombres as $n_hijo=>$nombre)
                    echo "<li>".$n_hijo.": ".$nombre."</li>";  
                echo "</ul>";
                echo "</li>";
            }else{
                echo "<li>".$parentesco.": ".$nombres."</li>";    
            }

        }
        echo "</ul>";
        echo "</li>";
    }
    echo "</ul>";
    ?>
</body>
</html>