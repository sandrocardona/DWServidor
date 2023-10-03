<?php
if(isset($_POST["submit"])){
    $texto=trim($_POST["texto"]);
    $strlen=strlen($texto);
    $error_form=$texto=="" || $strlen<3;
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
        <h2>Título</h2>
        <p>Enunciado</p>
        <form action="" method="post">
        <label for="texto">Palabra:</label>
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

            echo "<br/>";
            echo "<br/>";
            echo "<div class='div2'>";
            echo "<h2>Respuesta</h2>";
            echo "<p>".$texto."</p>";
            echo "</div>";

        }
    ?>
</body>
</html>