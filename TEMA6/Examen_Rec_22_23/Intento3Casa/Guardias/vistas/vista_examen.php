<?php
/* session_destroy(); */
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista examen</title>
</head>
<body>
    <h1>Gestión de Guardias</h1>
    <p>Bienvenido <?php echo $_SESSION["usuario"] ?></p>
    <form action="index.php" method="post"><button name="btnSalir">Salir</button></form>
</body>
</html>