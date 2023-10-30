<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo "<p>".ord("A")."</p>"; //65
    echo "<p>".ord("Z")."</p>"; //90
    echo "<p>".ord("hello")."</p>"; //104 Devuelve solo el primero ord("h")
    echo "<p>".ord("h")."</p>"; //104
    ?>
</body>
</html>