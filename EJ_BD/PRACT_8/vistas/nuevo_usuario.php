<?php
    if(isset($_POST["btnGuardar"])){
        //CONTROL DE ERRORES 
        $error_nombre=$_POST["nombre"]=="" || strlen($_POST["nombre"]>50);
        $error_usuario=$_POST["usuario"]=="" || strlen($_POST["usuario"])>30;
        $error_contraseña=$_POST["pwd"]=="" || strlen($_POST["pwd"])>50;
        $error_dni=$_POST["dni"]=="" || strlen($_POST["dni"])>10;//falta la función que verifica si el dni es válido o no
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error{color:red}
    </style>
</head>
<body>
<h2>Agregar nuevo usuario</h2>
    <form action="index.php" method="post">
        <!-- NOMBRE -->
         <p>
            <label for="nombre">Nombre:</label><br>
            <input type="text" name="nombre" id="nombre" value="<?php if(isset($_POST["nombre"])) echo $_POST["nombre"];?>">
            <?php
                if(isset($_POST["btnGuardar"]) && $error_nombre){
                    if($_POST["nombre"]=="")
                        echo "<span class='error'>Campo vacío</span>";
                    else
                        echo "<span class='error'>Introduce un máximo de 50 caracteres</span>";
                }
            ?>
         </p>

        <!-- USUARIO -->
         <p><label for='usuario'>Usuario:</label><br>
         <input type="text" name="usuario"></p>

        <!-- CONTRASEÑA -->
         <p><label for="pwd">Contraseña:</label><br>
         <input type="password" name="pwd"></p>

        <!-- DNI -->
         <p><label for="dni">DNI:</label><br>
         <input type="text" name="dni"></p>

        <!-- SEXO -->
         Sexo:
         <p><input type="radio" name="sexo" value="hombre">
         <label for="sexo">Hombre</label><br>

         <input type="radio" name="sexo" value="mujer">
         <label for="sexo">Mujer</label></p>

        <!-- IMAGEN -->
         <p><label for="foto">Incluir mi foto (Máx. 500KB) </label>
         <input type="file" name="foto"></p>

        <!-- BOTONES -->
         <button type="submit" name="btnGuardar">Guardar cambios</button>&nbsp;
         <button type="submit">Atrás</button>

    </form>
</body>
</html>