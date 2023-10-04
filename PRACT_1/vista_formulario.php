<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 1</title>
</head>
<body>
    <h1> Rellena tu CV </h1>
<form action="index.php" method="post" enctype="multipart/form-data">
        <!-- Campo para el nombre -->
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" value="<?php if(isset($_POST["nombre"])) echo $_POST["nombre"];?>"/>
        <?php
        if(isset($_POST["btnGuardarCambios"])&& $error_nombre){
            echo "<span class='error'> Campo vacio </span>";
        }
        ?>
        <br><br>

        <!-- Campo para los apellidos -->
        <label for="apellidos">Apellidos:</label><br>
        <input type="text" id="apellidos" name="apellidos" value="<?php if(isset($_POST["apellidos"])) echo $_POST["apellidos"];?>"/>
        <?php
        if(isset($_POST["btnGuardarCambios"])&& $error_apellidos){
            echo "<span class='error'> Campo vacio </span>";
        }
        ?>
        <br><br>

        <!-- Campo para la contraseña -->
        <label for="clave">Contraseña:</label><br>
        <input type="password" id="clave" name="clave"><br><br>

        <!-- Campo para el DNI -->
        <label for="dni">DNI:</label><br>
        <input type="text" placeholder="DNI: 11223344Z" id="dni" name="dni" value="<?php if(isset($_POST["dni"])) echo $_POST["dni"];?>"/>
        <?php
        if(isset($_POST["btnGuardarCambios"]) && $error_dni){
            if($_POST["dni"]==""){
                echo "<span class='error'> Campo vacio </span>";
            }elseif(!dni_bien_escrito(strtoupper($_POST["dni"]))){
                echo "<span class='error'> DNI mal escrito </span>";
            }else{
                echo "<span class='error'>DNI no valido </span>";
            }
        }
        ?>
        <br><br>
        <!-- Campo para el sexo -->
        <label for="sexo">Sexo:</label><br>
        <input type="radio" <?php if(isset($_POST["sexo"])&& $_POST["sexo"]=="masculino") echo "checked";?> id="sexo" name="sexo" value="masculino"/> Masculino<br>
        <input type="radio" <?php if(isset($_POST["sexo"])&& $_POST["sexo"]=="femenino") echo "checked";?> id="sexo" name="sexo" value="femenino"/> Femenino<br>
        <br><br>

        <!-- Campo para la provincia -->
        <label for="provincia">Provincia:</label>
        <select id="provincia" name="provincia">
            <option value="provincia1">Málaga</option>
            <option value="provincia2">Cadiz</option>
            <option value="provincia3">Sevilla</option>
        </select><br><br>

        <!-- Campo para la foto -->
        <label for="foto">Foto de perfil:</label>
        <input type="file" id="foto" name="foto"><br><br>

        <!-- Campo para los comentarios -->
        <label for="comentarios">Comentarios:</label><br>
        <textarea id="comentarios" name="comentarios" rows="4" cols="50"></textarea><br><br>

        <!-- Checkbox para opciones adicionales -->
        <label>Desea suscribirse al boletin de noticias: </label>
        <input type="checkbox" id="checkbox" name="checkbox" value="si">
        <br><br>

        <!-- Option para lugar nacimiento -->
        <p>
            <label for="nacido">Nacido en:</label>
            <select name="nacido" id="nacido">
                <option value="Málaga"<?php if(!isset($_POST["nacido"])|| (isset($_POST["nacido"]) && $_POST["nacido"]=="Málaga")) echo "selected";?>>Málaga</option>
                <option value="Marbella"<?php if(!isset($_POST["nacido"])|| (isset($_POST["nacido"]) && $_POST["nacido"]=="Marbella")) echo "selected";?>>Marbella</option>
                <option value="Istán"<?php if(!isset($_POST["nacido"])|| (isset($_POST["nacido"]) && $_POST["nacido"]=="Istán")) echo "selected";?>>Istán</option>
            </select>
        </p>

        <p>
            <label for="comentarios">Comentarios:</label>
            <textarea name="comentarios" id="comentarios" cols="30" rows="10"></textarea>
        </p>

        <p>
            <input type="checkbox" name="subscripcion" id="subscripcion">
            <label for="subscripcion">Subscribirse al boletín de novedades</label>
        </p>
        <!-- Botón de envío del formulario -->
        <input type="submit" value="Guardar Cambios" id="btnGuardarCambios" name="btnGuardarCambios">

        <!-- Botón de reinicio para borrar datos -->
        <input type="reset" value="Borrar Datos Introducidos">


    </form>
</body>
</html>


