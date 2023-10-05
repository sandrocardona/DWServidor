<?php
if(isset($_POST["submit"])){
    $texto1=trim($_POST["texto1"]);
    $texto2=trim($_POST["texto2"]);
    $l_texto1=strlen($texto1);
    $l_texto2=strlen($texto2);
    $error_texto1=$texto1=="" || $l_texto1<3;
    $error_texto2=$texto2=="" || $l_texto2<3;
    $error_form=$error_texto1 || $error_texto2;
}    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rimas</title>
    <style>
        .form_azul{background-color:lightblue; border:solid; padding:5px}
        .celeste{background-color:lightblue;}
        .centro{text-align:center}
        .error{color:red}
    </style>
</head>
<body>
    <br>
    <div>
    <form action="ej1_str.php" method="post">
        <h2></h2>
        <p></p>
    <br>
        <label for="texto1">Primera palabra:</label>
        <input type="text" id="texto1" name="texto1" value="<?php if(isset($_POST["texto1"])) echo $_POST["texto1"];?>"/>
    <br><br>
        <label for="texto2">Segunda palabra:</label>
        <input type="text" id="texto2" name="texto2" value="<?php if(isset($_POST["texto2"])) echo $_POST["texto2"];?>"/>

        <?php
        if(isset($_POST["btnComparar"]) && $error_texto1){
            if($texto1==""){
                echo "<span class='error'>Campo vacío</span>";
            }else{
                echo "<span class='error'>teclea al menos 3 caracteres</span>";
            }
        }
        ?>
        <input type="submit" value="guardar" id="submit" name="submit">

    </form>
    </div>
    <?php
    if(isset($_POST["submit"]) && !$error_form){
        $texto1_m=strtoupper($texto1);
        $texto2_m=strtoupper($texto2);

        $respuesta="no riman";
        if($texto1_m[$l_texto1-1]==$texto2_m[$l_texto2-1] && $texto1_m[$l_texto1-2]==$texto2_m[$l_texto2-2]){
            $respuesta="riman un poco";
            if($texto1_m[$l_texto1-3]==$texto2_m[$l_texto2-3]){
                $respuesta="riman";
            }
        }

        echo "<br/>";
        echo "<br/>";

        echo "<div class='verdoso'>";
        echo "<h2 class='centro'>Respuesta</h2>";
        echo "<p>Las palabras <strong>".$texto1."</strong> y <strong>.$texto2.</strong>".$respuesta."</p>";
        echo "</div>";

    }
    ?>

</body>
</html>