<?php
if(isset($_POST["btnEnviar"])){
    $error_form=$_POST["num"]=="" || !is_numeric($_POST["num"]) || $_POST["num"]<1 || $_POST["num"]>10;
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 Fichero Texto</title>
    <style>
        .error{color:red}
    </style>
</head>
<body>
    <h1>Ejercicio 1</h1>
    <form action="EJ_1.php" method="post">
        <p>
            <label for="num">Introduzca un número entre 1 y 10</label>
            <input type="text" name="num" id="num" value="<?php if(isset($_POST["num"])) echo $_POST["num"];?>">
            <?php
            if(isset($_POST["btnEnviar"]) && $error_form){
                if($_POST["num"]=="")
                    echo "<span class='error'>Campo vacío</span>";
                else
                    echo "<span class='error'>No has introducido un número</span>";
            }
            ?>
        </p>
        <p>
            <button type="submit" name="btnEnviar">Generar Fichero</button>
        </p>
    </form>
    <?php
    if(isset($_POST["btnEnviar"]) && !$error_form){
        $nombre_fichero="tabla_".$_POST["num"].".txt";
        if(!file_exists("Tablas/".$nombre_fichero)){
        @$fd=fopen("Tablas/".$nombre_fichero,"w");
        if(!$fd)
            die("<p>No se ha podido crear el fichero 'Tablas/".$nombre_fichero."'</p>");

        for($i=1;$i<=10;$i++){
            $linea = $i." x ".$_POST["num"]." = ".$i*$_POST["num"].PHP_EOL;
            fputs($fd, $linea);
        }
        fclose($fd);
        }
        echo "<p>Fichero generado con éxito</p>";
    }
    ?>

</body>
</html>