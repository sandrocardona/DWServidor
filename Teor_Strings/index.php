<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $str1="     Hola que tal?     ";
    $str1=trim($str1);
    $str2="Juan";

    echo "<h1>".$str1." ".$str2."</h1>";
    $longitud=strlen($str2);
    echo "<p>La longitud del String: '".$str1."' es: ".$longitud."</p>";


    $str1[12]="!";
    echo "<p>".$str1."</p>";
    echo "<p>".strtoupper($str2)."</p>";
    echo "<p>".$str2."</p>";

    $prueba="Hola mi nombre es: Miguel Santos Morales";
    $sep_arr=explode(": ",$prueba);
    print_r($sep_arr);

    $jpg="ñaslk.dfjñ.lajs.jpg";
    
    $arr_prueba=array("Hola", "Juan", "Antonio", 12, "María");
    print_r($arr_prueba);
    $str3=implode(":",$arr_prueba);
    echo "<p>".$str3."</p>";

    echo "<p>".substr("hola que tal, Juan", 0, 6)."</p>";
    ?>
</body>
</html>