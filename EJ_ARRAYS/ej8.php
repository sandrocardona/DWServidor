<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $personas=array("Pedro","Ismael","Sonia","Clara","Susana","Alfonso","Teresa");
        echo "<p>El array contiene ".count($personas)." personas.</p>";
        for($i=0; $i<count($personas); $i++){
                echo "<p><ul><li>".$personas[$i]."</li></ul></p>";   
        }

    ?>
</body>
</html>