<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- 19.Sep -->
    <h1>Esta es mi super página</h1>
    <form action="getdatos.php" method="post" enctype="multipart/form-data">
        
        <!-- NOMBRE -->
    <p>
        <label for="name">Nombre:</label><br>
        <input type="text" id="name" name="name">
    </p>
    <br><br>

        <!-- NACIDO -->
    <p>
        <label for="nacido">Nacido en:</label>
        <select name="nacido" id="nacido">
            <option value="Málaga">Málaga</option>
            <option value="Marbella">Marbella</option>
        </select>
    </p>
    <br><br>

        <!-- SEXO -->
    <p>
        <label for="sexo">Sexo:</label>
        <input type="radio" id="sexo" name="sexo" value="Hombre">Hombre
        <input type="radio" id="sexo" name="sexo" value="Mujer">Mujer
    </p>
    <br><br>

        <!-- AFICIONES -->
    <p>
        <label for="aficiones">Aficiones:</label>
        <input type="radio" id="aficiones" name="aficiones">Deportes
        <input type="radio" id="aficiones" name="aficiones">Lectura
        <input type="radio" id="aficiones" name="aficiones">Otros
    </p>    
        <br><br>

        <!-- COMENTARIOS -->
    <p>
        <label for="comentarios">Comentarios:</label>
        <textarea name="comentarios" id="comentarios" cols="10" rows="1"></textarea>
    </p>
    <br><br>

        <!-- SUBMIT -->
    <p>
        <input type="submit" value="guardar" id="submit" name="submit">
        <input type="reset" value="Borrar">
    </p>    
    </form>

</body>
</html>