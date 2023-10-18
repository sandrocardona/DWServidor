<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
    <style>
        table {
            width: 90%;
            margin: 0 auto;
            text-align: center;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1>Ejercicio 5</h1>
    <?php
    @$fd=fopen("http://dwese.icarosproject.com/PHP/datos_ficheros.txt","r");
    if(!$fd)
        die("<h3>No se ha podido abrir el fichero <em>'http://dwese.icarosproject.com/PHP/datos_ficheros.txt'</em></h3>");
    echo "<table>";
    echo "<caption> PIB per cápita de los países de la UE</caption>";
    $linea=fgets($fd);
    $datos_linea=explode("\t", $linea);
    $n_col=count($datos_linea);
    echo "<tr>";
    for ($i=0; $i < $n_col; $i++) { 
        echo "<th>".$datos_linea[$i]."</th>";
    }
    echo "</tr>";

    while($linea=fgets($fd)){
        $datos_linea=explode("\t", $linea);
        echo "<tr>";
        for ($i=0; $i < $n_col; $i++) { 
            if(isset($datos_linea[$i]))
                echo "<td>".$datos_linea[$i]."</td>";
            else
                echo "<td></td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>
    </form>
</body>
</html>