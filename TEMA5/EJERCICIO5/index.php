<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5 POO</title>
</head>
<body>
    <h1>Ejercicio 5</h1>
    <?php
    require "./class_empleados.php";

    $empleado1=new Empleado("Juan Palomo","2999");
    $empleado2=new Empleado("Miguelito","3000");
    $empleado3=new Empleado("Mariquilla","3001");

    echo "<h2>Información de los empleados</h2>";
    $empleado1->impuestos();
    $empleado2->impuestos();
    $empleado3->impuestos();
    
    ?>
</body>
</html>