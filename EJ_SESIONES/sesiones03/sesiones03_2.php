<?php
    session_name("sesiones03");
    session_start();

    if(isset($_POST["btnContador"])){
        if($_POST["btnContador"]=="cero"){
            session_destroy();
        }elseif($_POST["btnContador"]=="menos"){
            $_SESSION["contador"]--;
        }elseif($_POST["btnContador"]=="mas"){
            $_SESSION["contador"]++;
        }
    }

    header("Location:sesiones03_1.php");
    exit;
    
?>
