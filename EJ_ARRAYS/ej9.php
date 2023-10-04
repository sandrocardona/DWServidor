<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ejercicio 9</h1>

    <?php
/*         $lenguajes_cliente=array("LC1","LC2","LC3");
        $lenguajes_servidor=array("LS1","LS2","LS3","LS4"); */
        $lenguajes_cliente = array("LCI" => "Lenguaje Cliente", "LCI2" => "Lenguaje Cliente2", "LCI3" => "Lenguaje Cliente3", "LCI4" => "Lenguaje Cliente4");
        $lenguajes_servidor = array("LSI" => "Lenguaje Servidor", "LSI2" => "Lenguaje Servidor2", "LSI3" => "Lenguaje Servidor3", "LSI4" => "Lenguaje Servidor4");
        $lenguajes=array();

            //forma 2(Más sencilla)
    $lenguajes = $lenguajes_cliente + $lenguajes_servidor;

    //mostramos en común
    echo "<table>";
    echo "<tr><th>Lenguajes</th></tr>";
    
    foreach ($lenguajes as $indice => $contenido) {
        echo "<tr>";
        echo "<td>" . $contenido . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
    ?>
</body>
</html>