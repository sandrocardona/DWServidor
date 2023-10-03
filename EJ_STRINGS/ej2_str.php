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
        <form action="ej2_str.php" method="post">
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

            $i=0;
            $j=$strlen-1;
            $bien=true;
            while($i<$j && $bien){
                if($palabra_m[$i]==$palabra_m[$j]){
                    $i++;
                    $j--;
                }
                else{
                    $bien=false;
                }
            }

            if($bien){
                if(is_numeric($palabra)){
                    $respuesta="el número <strong>".$palabra."</strong> es capicúo";
                }else{
                    $respuesta="la palabra <strong>".$palabra."</strong> es capicúa";
                }
            }else{
                if(is_numeric($palabra)){
                    $respuesta="el número <strong>".$palabra."</strong> no es capicúo";
                }else{
                    $respuesta="la palabra <strong>".$palabra."</strong> no es capicúa";
                }
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