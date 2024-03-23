<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TABLA</title>
</head>
<body>
    <h1>Guardias</h1>
    <p>Bienvenido <?php echo $_SESSION["usuario"] ?></p>
    <form action="index.php" method="post">
        <button type="submit" name="btnSalir">Salir</button>
    </form>
</body>
</html>