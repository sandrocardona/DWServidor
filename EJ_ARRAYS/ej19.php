<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $amigos["Madrid"]["Pedro"]["Edad"]="28";
        $amigos["Madrid"]["Pedro"]["Tlfn"]="600123456";
        $amigos["Madrid"]["Antonio"]["Edad"]="28";
        $amigos["Madrid"]["Antonio"]["Tlfn"]="600123456";
        $amigos["Madrid"]["Alguien"]["Edad"]="28";
        $amigos["Madrid"]["Alguien"]["Tlfn"]="600123456";
        $amigos["Barcelona"]["Susana"]["Edad"]="28";
        $amigos["Barcelona"]["Susana"]["Tlfn"]="600123456";
        $amigos["Toledo"]["Nombre"]["Edad"]="28";
        $amigos["Toledo"]["Nombre"]["Tlfn"]="600123456";
        $amigos["Toledo"]["Nombre2"]["Edad"]="28";
        $amigos["Toledo"]["Nombre2"]["Tlfn"]="600123456";
        $amigos["Toledo"]["Nombre3"]["Edad"]="28";
        $amigos["Toledo"]["Nombre3"]["Tlfn"]="600123456";

        foreach($amigos as $ciudad=>$personas){
            echo "<p>Amigos en: ".$ciudad."</p>";
            echo "<ol>";
            foreach($personas as $nombre=>$datos){
                echo "<li>Nombre: ".$nombre.". Edad: ".$datos["Edad"].". Tlfn: ".$datos["Tlfn"]."</li>";
            }
            echo "</ol>";
        }
    ?>
</body>
</html>