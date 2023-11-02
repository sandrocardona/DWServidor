<?php

//Control de errores
if(isset($_POST["btnContar"])){
    $error_form=$_POST["texto"]=="";
}

//Funciones
function contar($sep, $texto){
    $aux=[];
    $i=0;
    $longitud=strlen($texto);

    while($i<$longitud && $texto[$i]==$sep){
        $i++;
    }

    if($i<$longitud && $texto[$i]!=$sep){
        $j=0;
        $aux[$j]=$texto[$i];
        for ($i=$i+1; $i < $longitud; $i++) {
            $aux[$j].=$texto[$i];
        }
    }

    if($i<$longitud && $texto[$i]==$sep){
        $j++;
    }

    return $aux;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error{color: red}
    </style>
</head>
<body>
    <h1>Ejercicio 2. Contar palabras sin las vocales(a,e,i,o,u,A,E,I,O,U)</h1>
    <form action="ejercicio2.php" method="post">
        <p>
            <label for="texto">Introduzca un texto</label>
            <input type="text" name="texto" id="texto">
            <select name="sep" id="sep">
                <option value=",">Coma (,)</option>
                <option value=".">Punto (.)</option>
                <option value=";">Punto y coma (;)</option>
                <option value=" ">Espacio</option>
                <option value=":">Dos puntos (:)</option>
            </select>
            <button type="submit" name="btnContar" id="btnContar">Contar</button>
        </p>
        <?php
            if(isset($_POST["btnContar"]) && $error_form){
                echo "<p class='error'>Campo vacío</p>";
            }
        ?>
    </form>
    <?php
    if(isset($_POST["btnContar"]) && !$error_form){
        echo "<p>el número de palabras es de: ".count(contar($_POST["sep"], $_POST["texto"]))."</p>";
    }
    ?>
    
</body>
</html>