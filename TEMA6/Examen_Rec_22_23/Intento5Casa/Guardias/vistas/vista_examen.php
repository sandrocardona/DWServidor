<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TABLA</title>
</head>
<body>
    <h1>vista examen</h1>
    <p>Hola <strong><?php echo $_SESSION["usuario"] ?></strong></p>
    <form action="index.php" method="post">
        <button type="submit" name="btnSalir">Salir</button>
    </form>
</body>
</html>