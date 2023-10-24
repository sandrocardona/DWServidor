<!-- Control de errores -->
<?php

/* Funcion contador de caracteres */
function mi_strlen($texto)
{
    $cont=0;
    while(isset($texto[$cont]))
        $cont++;
    return $cont;
}

/* Función  */
function mi_explode($separador, $texto)
{
    $aux=[]; //$aux=array();
    $l_texto=mi_strlen($texto);
    $i=0;
    while($i<$l_texto && $texto[$i]==$separador)
        $i++;
    if($i<$l_texto)
    {
        $j=0;
        $aux[$j]=$texto[$i];
        for($i=$i+1; $i<$l_texto; $i++)
        {
            if($texto[$i]!=$separador)
            {
                $aux[$j].=$texto[$i];
            }
            else
            {
                while($i<$l_texto && $texto[$i]==$separador)
                    $i++;
                if($i<$l_texto)
                {    $j++;
                    $aux[$j]=$texto[$i];
                }
            }
        }
    }
    return $aux;
}

 if(isset($_POST["btnEnviar"]))
 {
    $error_form=$_POST["texto"]=="";
 }
 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    <style>
        .error{color:red}
    </style>
</head>
<body>
    <h1>Ejercicio 3</h1>
    <form action="ejercicio3.php" method="post">
        <!-- Select separador -->
        <p>
            <label for="sep" id="sep">Elija separador:</label>
            <select name="sep" id="sep">
                <option <?php if(isset($_POST["btnEnviar"]) && $_POST["sep"]==",") echo "selected"; ?> value=",">, (coma)</option>
                <option <?php if(isset($_POST["btnEnviar"]) && $_POST["sep"]==";") echo "selected"; ?> value=";">; (punto y coma)</option>
                <option <?php if(isset($_POST["btnEnviar"]) && $_POST["sep"]==".") echo "selected"; ?> value=".">; value=".">. (punto)</option>
                <option <?php if(isset($_POST["btnEnviar"]) && $_POST["sep"]==":") echo "selected"; ?> value=":">; value=":">: (dos puntos)</option>
                <option <?php if(isset($_POST["btnEnviar"]) && $_POST["sep"]==" ") echo "selected"; ?> value=" ">; value=" ">(espacio)</option>
            </select>
        </p>
        <!-- Input texto -->
        <p>
        <label for="texto">Introduce un texto:</label>
        <input type="text" name="texto" id="texto" value="<?php if(isset($_POST["texto"])) echo $_POST["texto"]?>">
        </p>   
        <!-- boton enviar -->
        <p>
            <button type="submit" name="btnEnviar" id="btnEnviar">Enviar</button>
        </p>
        <?php
        if(isset($_POST["btnEnviar"]) && $error_form)
        {
            echo "<span class='error'>Introduce un texto</span>";
        }
        ?>
    </form>
    <?php
    if(isset($_POST["btnEnviar"]) && !$error_form)
    {
        echo "<h2>Respuesta</h2>";
        echo "<p>El número de palabras es de: ".count(mi_explode($_POST["sep"], $_POST["texto"]))."</p>";
    }
    ?>
</body>
</html>