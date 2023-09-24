<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <style>
        .error{color:red}
    </style>
</head>
<body>
    <!-- 19.Sep -->
    <h1>Esta es mi super página</h1>
    <form action="index.php" method="post" enctype="multipart/form-data">
        
        <!-- NOMBRE -->
    <p>
        <label for="name">Nombre:</label><br>
        <input type="text" id="name" name="name" value="<?php if(isset($_POST["name"])) echo $_POST["name"];?>"/>
        <?php
        if(isset($_POST["submit"]) && $error_nombre){
            echo "<span class='error'>Campo vacío</span>";
        }
        ?>
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
        <input type="radio" <?php if(isset($_POST["sexo"]) && $_POST["sexo"]=="Hombre") echo "checkedH";?> id="sexo" name="sexo" value="Hombre">Hombre
        <input type="radio" <?php if(isset($_POST["sexo"]) && $_POST["sexo"]=="Mujer") echo "checkedM"?> id="sexo" name="sexo" value="Mujer">Mujer
        <?php
            if(isset($_POST["submit"]) && $error_sexo){
                echo "<span class='error'>Campo obligatorio</span>";
            }
        ?>
    </p>
    <br><br>

        <!-- AFICIONES -->
    <p>
        <label for="aficiones">Aficiones:</label>
        <input type="checkbox" id="deportes" name="aficiones">Deportes</input>
        <input type="checkbox" id="lectura" name="aficiones">Lectura</input>
        <input type="checkbox" id="otros" name="aficiones">Otros</input>
    </p>    
        <br><br>

        <!-- COMENTARIOS -->
    <p>
        <label for="comentarios">Comentarios:</label>
        <textarea name="comentarios" id="comentarios" cols="30" rows="1"></textarea>
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