<?php
if(isset($_POST["submit"])){
    $palabra=trim($_POST["palabra"]);
    $strlen=strlen($palabra);
    $error_form=$palabra=="" || $strlen<3;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .div1{background-color:lightblue; border:solid; text-align:center} 
        .div2{background-color:lightgreen; border:solid; text-align:center}
        .error{color:red}
    </style>
</head>
<body>
    <div class="div1">
        <h2>Palíndromos y capicúas</h2>
        <p>Introduce palabra o número</p>
        <form action="ej3_str.php" method="post">
        <label for="palabra">Palabra:</label>
        <input type="text" name="palabra" id="palabra" value="<?php if(isset($_POST["palabra"])) echo $_POST["palabra"];?>"/>
        <?php
        if(isset($_POST["submit"]) && $error_form){
            echo "<p class='error'>introduce más de 3 caracteres</p>";
        }
        ?>
        <br><br>
        <input type="submit" value="Comprobar" name="submit" id="submit"/>
        </form>
    </div>

    <?php
        if(isset($_POST["submit"]) && !$error_form){
            $palabra_m=strtoupper($palabra);
/*             $cadena=str_split($palabra_m); */
/*             for ($i=0; $i < count($cadena) ; $i++) { 
                echo $cadena[$i];
            } */
            $texto="";

            $i=0;
            $j=$strlen-1;
            $bien=true;

            for ($i=0; $i < strlen($palabra) ; $i++){ 
                if($palabra_m[$i]!=" "){
                    $texto.=$palabra_m[$i];
                }
            }


            while($i<$j && $bien){
                if($texto[$i]==$texto[$j]){
                    $i++;
                    $j--;
                }
                else{
                    $bien=false;
                }
            }

            //Respuesta

            if($bien){
                $respuesta="la palabra <strong>".$palabra."</strong> es capicúa";
            }else{
                $respuesta="la palabra <strong>".$palabra."</strong> no es capicúa";
            }

            echo "<br/>";
            echo "<br/>";
            echo "<div class='div2'>";
            echo "<h2>Respuesta</h2>";
            echo "<p>".$respuesta."</p>";
            echo "</div>";

        }
    ?>
    
</body>
</html>