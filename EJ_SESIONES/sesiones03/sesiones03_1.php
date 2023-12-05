<?php
    session_name("sesiones03");
    session_start();
    if(!isset($_SESSION["contador"]))
        $_SESSION["contador"]=0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUBIR Y BAJAR NUMERO</title>
    <style>
        .centrado{text-align: center;}
        .boton{border: 0.5px solid blue; background-color: lightblue; border-radius: 4px; width: 25px; text-align: center; font-weight: bold;}
    </style>
</head>
<body>
    <h1 class="centrado">SUBIR Y BAJAR NUMERO</h1>
    <form action="sesiones03_2.php" method="post">
        <p>Haga click en los botones para modificar el valor</p>
        <p>
            <button type="submit" name="btnContador" class="boton" value="menos">-</button>
            <span class="texto-grande">
            <?php
                echo $_SESSION["contador"];
            ?>
            </span>
            <button type="submit" name="btnContador" class="boton" value="mas">+</button>
        </p>
        <p>
            <button type="submit" name="btnContador" value="cero">Poner a cero</button>
        </p>
    </form>
</body>
</html>