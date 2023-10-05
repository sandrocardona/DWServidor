<?php

const VALOR=array("M"=>1000, "D"=>500, "C"=>100, "L"=>50, "X"=>10, "V"=>5, "I"=>1);

function letras_bien($texto){
    $bien=true;
    for($i=0; $i<strlen($texto); $i++){
        if(!isset(VALOR[$texto[$i]])){
            $bien=false;
            break;
        }
    }
    return $bien;
}

function orden_bueno($texto){
    $bien=true;
    for($i=0; $i<strlen($texto)-1; $i++){
        if(VALOR[$texto[$i]]<VALOR[$texto[$i+1]]){
            $bien=false;
            break;
        }
    }
    return $bien;
}

function repite_bien($texto){
    $veces["I"]=4;
    $veces["V"]=1;
    $veces["X"]=4;
    $veces["L"]=1;
    $veces["C"]=4;
    $veces["D"]=1;
    $veces["M"]=4;

    $bien=true;
    for($i=0; $i<strlen($texto);$i++){
        $veces[$texto[$i]]--;
        if($veces[$texto[$i]]==-1){
            $bien=false;
            break;
        }
    }
    return $bien;
}


function es_correcto_romano($texto){
    return letras_bien($texto) && orden_bueno($texto) && repite_bien($texto);
}

if(isset($_POST["submit"])){
    $texto=trim($_POST["texto"]);
    $texto_m=strtoupper($texto);
    $error_form=$texto=="" || !es_correcto_romano($texto_m);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor</title>
    <style>
        .div1{background-color:lightblue; border:solid; text-align:center} 
        .div2{background-color:lightgreen; border:solid; text-align:center}
        .error{color:red}
    </style>
</head>
<body>
<div class="div1">
        <h2>Romanos a árabe</h2>
        <p>Introduce un número romano</p>
        <form action="ej4_str.php" method="post">
        <label for="palabra">Palabra:</label>
        <input type="text" name="texto" id="texto" value="<?php if(isset($_POST["texto"])) echo $_POST["texto"];?>"/>
        <?php
        if(isset($_POST["submit"])&& $error_form){
            if($texto==""){
                echo "<span class='error'>Campo vacío</span>";
            }else{
                echo "<span class='error'>Número romaro incorrecto</span>";
            }
        }
        ?>
        <br><br>
        <input type="submit" value="Comprobar" name="submit" id="submit"/>
        </form>
    </div>

    <?php
    if(isset($_POST["submit"]) && !$error_form){

        $res=0;
        for($i=0; $i<strlen($texto); $i++){
            $res+=VALOR[$texto_m[$i]];
        }
        echo "<br/>";
        echo "<br/>";
        echo "<div class='div2'>";
        echo "<h2>Respuesta:</h2>";
        echo "<p>".$res."</p>";
        echo "</div>";
    }
    ?>
</body>
</html>


<!-- EJERCICIO TERMINADO -->