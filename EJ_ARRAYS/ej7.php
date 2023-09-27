<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $ciudad["MD"]="madrid";
    $ciudad["BCN"]="barcelona";
    $ciudad["LND"]="londres";

    foreach($ciudad as $indice => $contenido){
        echo "<p>indice: ".$indice." ciudad: ".$contenido."</p>";
    }
    ?>
</body>
</html>