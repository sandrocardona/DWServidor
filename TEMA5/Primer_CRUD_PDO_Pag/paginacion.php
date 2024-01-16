<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>listado usuarios</h2>
    <form id='regis_busc' action="index.php" method='post'>
        <div>
            <label for="n_registros">Registros a mostrar:</label>
            <select name="" id="">
                <option value="3" <?php if($_SESSION["n_registros"]==="3") echo "selected";?>>3</option>
                <option value="6" <?php if($_SESSION["n_registros"]==="6") echo "selected";?>>6</option>
                <option value="-1" <?php if($_SESSION["n_registros"]==="-1") echo "selected";?>>TODOS</option>
            </select>
        </div>
    </form>
</body>
</html>