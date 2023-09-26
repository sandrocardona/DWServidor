<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teoría Arrays</title>
</head>
<body>
    <?php
    /*$nota[0]=5;
    $nota[1]=9;
    $nota[2]=8;
    $nota[3]=5;
    $nota[4]=6;
    $nota[5]=7;*/

    $nota=array(5,9,8,5,6,7);

    echo "<h1>Recorrido de un array escalar con sus indices correlativos y en orden</h1>";
    for($i=0;$i<count($nota); $i++){
        echo "<p>En la posicion: ".$i." tiene el valor: ".$nota[$i]."</p>";
    }

    print_r($nota);
    echo "<br>";
    var_dump($nota);

    /*$valor[0]=18;
    $valor[1]="Hola";
    $valor[2]=true;
    $valor[3]=3.4;*/

    /*$valor[]=18;
    $valor[99]="Hola";
    $valor[]=true;
    $valor[200]=3.4;*/

    $valor=array(18,99=>"Hola",false,200=>3.4);

    echo "<h1>Recorrido array escalar con indices NO correlativo</h1>";

    foreach($valor as $indice => $contenido){
        echo "<p>En la pos: ".$indice." tiene el valor: ".$contenido."</p>";
    }

    $nota["Antonio"]["DWESE"]=5;
    $nota["Antonio"]["DWEC"]=7;
    $nota["Luis"]["DWESE"]=9;
    $nota["Luis"]["DWEC"]=7;
    $nota["Ana"]["DWESE"]=8;
    $nota["Ana"]["DWEC"]=9;
    $nota["Eloy"]["DWESE"]=5;
    $nota["Eloy"]["DWEC"]=6;

    echo "<h1>Notas</h1>";
    foreach($nota as $nombre => $asignaturas){
        echo "<p>".$nombre."<ul>";
        foreach($asignaturas as $nombre_asig => $valor){
            echo "<li><strong/>".$nombre_asig."</strong>:".$valor."</li>";
        }
        echo "</ul></p>";
    }


    $capital=array("Castilla y león"=>"Valladolid", "Asturias"=>"Oviedo", "Aragón"=>"Zaragoza");
    
    echo "<p>Ultimo valor array: ".current($capital)."</p>";
    echo "<p>Ultimo valor de un array: ".key($capital)."</p>";
    echo end($capital);

    echo "<p>Ultimo valor array: ".current($capital)."</p>";
    echo "<p>Ultimo valor de un array: ".key($capital)."</p>";
    echo reset($capital);

    echo "<p>Ultimo valor array: ".current($capital)."</p>";
    echo "<p>Ultimo valor de un array: ".key($capital)."</p>";
    echo next($capital);

    echo "<p>Ultimo valor array: ".current($capital)."</p>";
    echo "<p>Ultimo valor de un array: ".key($capital)."</p>";
    echo next($capital);

    echo "<p>Ultimo valor array: ".current($capital)."</p>";
    echo "<p>Ultimo valor de un array: ".key($capital)."</p>";
    echo next($capital);

    echo "<p>Ultimo valor array: ".current($capital)."</p>";
    echo "<p>Ultimo valor de un array: ".key($capital)."</p>";
    echo prev($capital);

    /*while($a=7){
        echo "<strong>".current($capital)."</strong><br/>";
        next($capital);
    }*/
    
    ?>
    
</body>
</html>