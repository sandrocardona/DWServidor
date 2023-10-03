<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $familias["Los Simpson"]["Padre"]="Homer";
    $familias["Los Simpson"]["Madre"]="Marge";
    $familias["Los Simpson"]["Hijos"]["Hijo1"]="Bart";
    $familias["Los Simpson"]["Hijos"]["Hijo2"]="Lisa";
    $familias["Los Simpson"]["Hijos"]["Hijo3"]="Maggie";
    $familias["Los Griffin"]["Padre"]="Peter";
    $familias["Los Griffin"]["Madre"]="Lois";
    $familias["Los Griffin"]["Hijos"]["Hijo1"]="Chris";
    $familias["Los Griffin"]["Hijos"]["Hijo2"]="Meg";
    $familias["Los Griffin"]["Hijos"]["Hijo3"]="Stewie";


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