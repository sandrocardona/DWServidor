<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 1</title>
    <style>
        .error{color:red}
    </style>
</head>
<body>
    <h1> Rellena tu CV </h1>
<form action="index.php" method="post" enctype="multipart/form-data">
        <!-- Campo para el nombre -->
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre" value="<?php if(isset($_POST["nombre"])) echo $_POST["nombre"];?>"/>
        <?php
        if(isset($_POST["btnGuardarCambios"])&& $error_nombre){
            echo "<span class='error'>Campo obligatorio</span>";
        }
        ?>
        <br><br>

        <!-- Campo para el usuario -->
        <label for="usuario">Usuario:</label><br>
        <input type="text" id="usuario" name="usuario" placeholder="usuario" value="<?php if(isset($_POST["usuario"])) echo $_POST["usuario"];?>"/>
        <?php
        if(isset($_POST["btnGuardarCambios"])&& $error_usuario){
            echo "<span class='error'>Campo obligatorio</span>";
        }
        ?>
        <br><br>

        <!-- Campo para la contraseña -->
        <label for="clave">Contraseña:</label><br>
        <input type="password" id="clave" name="clave" placeholder="contraseña">
        <?php
        if(isset($_POST["btnGuardarCambios"]) && $error_clave){
            echo "<span class='error'>Campo obligatorio</span>";
        }
        ?>
        <br><br>
        <!-- Campo para el DNI -->
        <label for="dni">DNI:</label><br>
        <input type="text" placeholder="DNI: 11223344Z" id="dni" name="dni" value="<?php if(isset($_POST["dni"])) echo $_POST["dni"];?>"/>
        <?php
        if(isset($_POST["btnGuardarCambios"]) && $error_dni){
            if($_POST["dni"]==""){
                echo "<span class='error'>Campo obligatorio</span>";
            }elseif(!dni_bien_escrito(strtoupper($_POST["dni"]))){
                echo "<span class='error'>DNI mal escrito</span>";
            }else{
                echo "<span class='error'>DNI no valido</span>";
            }
        }
        ?>
        <br><br>
        <!-- Campo para el sexo -->
        <label for="sexo">Sexo:</label><br>
        <input type="radio" <?php if(isset($_POST["sexo"])&& $_POST["sexo"]=="masculino") echo "checked";?> id="sexo" name="sexo" value="masculino"/>Hombre<br>
        <input type="radio" <?php if(isset($_POST["sexo"])&& $_POST["sexo"]=="femenino") echo "checked";?> id="sexo" name="sexo" value="femenino"/>Mujer<br>
        <?php
        if(isset($_POST["btnGuardarCambios"]) && $error_sexo){
            echo "<span class='error'>Campo obligatorio</span>";
        }
        ?>
        <br><br>

        <!-- Campo para la foto -->
        <label for="foto">Incluir mi foto (Archivo de tipo imágen máx 500KB):</label>
        <input type="file" id="foto" name="foto" accept="image/*"><br><br>
        <?php
        if(isset($_POST["btnGuardarCambios"]) && $error_foto){
            if($_FILES["foto"]["error"]){
                echo "<span class='error'>la foto no se ha subido correctamente al servidor</span>";
            }else if(!getimagesize($_FILES["foto"]["tmp_name"])){
                echo "<span class='error'>El archivo seleccionado debe de ser una imagen</span>";
            }else if($_FILES["foto"]["size"]>500*1024){
                echo "<span class='error'>El archivo seleccionado pesa demasiado</span>";
            }
        }
        //Incluir Foto: en hoja respuestas
        ?>
        <p>
            <input type="checkbox" name="subscripcion" id="subscripcion">
            <label for="subscripcion">Subscribirse al boletín de novedades</label>
        </p>
        <!-- Botón de envío del formulario -->
        <input type="submit" value="Guardar Cambios" id="btnGuardarCambios" name="btnGuardarCambios">

        <!-- Botón de reinicio para borrar datos -->
        <input type="reset" value="Borrar los datos introducidos">
    </form>
</body>
</html>


