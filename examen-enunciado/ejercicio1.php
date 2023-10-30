<?php
/*Funciones*/
function first(){
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ejercicio 1. Generador de "claves_polybios.txt"</h1>
    <form action="ejercicio1.php" method="post">
    <button type="submit" name="btnEnviar" id="btnEnviar">Generar</button>
    </form>
    <?php
    if(isset($_POST["btnEnviar"])){
        echo "<p>Pulsado</p>";
    }


    function mi_explode($sep,$texto)
{
    $aux=[];
    $l_texto=mi_strlen($texto);
    $i=0;
    while($i<$l_texto && $texto[$i]==$sep)
        $i++;


    if($i<$l_texto)
    {
        $j=0;
        $aux[$j]=$texto[$i];
        for($i=$i+1;$i<$l_texto;$i++)
        {
            if($texto[$i]!=$sep)
            {
                $aux[$j].=$texto[$i];
            }
            else
            {

                while($i<$l_texto && $texto[$i]==$sep)
                    $i++;
                
                if($i<$l_texto)
                {
                    $j++;
                    $aux[$j]=$texto[$i];
                }
                
            }
        }


    }
    
    return $aux;
}function mi_explode($sep,$texto)
{
    $aux=[];
    $l_texto=mi_strlen($texto);
    $i=0;
    while($i<$l_texto && $texto[$i]==$sep)
        $i++;


    if($i<$l_texto)
    {
        $j=0;
        $aux[$j]=$texto[$i];
        for($i=$i+1;$i<$l_texto;$i++)
        {
            if($texto[$i]!=$sep)
            {
                $aux[$j].=$texto[$i];
            }
            else
            {

                while($i<$l_texto && $texto[$i]==$sep)
                    $i++;
                
                if($i<$l_texto)
                {
                    $j++;
                    $aux[$j]=$texto[$i];
                }
                
            }
        }


    }
    
    return $aux;
}
    ?>
</body>
</html>