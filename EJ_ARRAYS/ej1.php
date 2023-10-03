<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numeros Pares</title>
</head>
<body>
<?php
echo "<h1>Ejercicio 1</h1>";
function crea_pares($cantidad)
{
    for ($i = 0; $i < 2 * $cantidad; $i += 2) {
        $pares[] = $i;
    }
    return $pares;
}

$pares = crea_pares(10);
echo "<p>";
for ($i = 0; $i < count($pares); $i++) {
    echo $pares[$i] . "<br/>";
}
echo "</p>";

?>

</body>
</html>