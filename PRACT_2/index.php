<?php

    function en_array($valor, $arr){
        $esta=false;
        for($i=0; $i<count($arr);$i++){
            if($arr[$i]==$valor){
                $esta=true;
                break;
            }
        }
        return $esta;
    }

    if(isset($_POST["btnBorrar"])){
        unset($_POST);
        //header("Location: index.php");
    }

    //compruebo errores
    if(isset($_POST["submit"])){
        $error_nombre=$_POST["nombre"]=="";
        $error_sexo=!isset($_POST["sexo"]);
        $error_form=$error_nombre||$error_sexo;
    }
    //Decido vista según errores
    if(isset($_POST["submit"]) && !$error_form){
        require "vistas/respuesta.php";
    }else{
        require "vistas/vistaform.php";
    }

//boton borrar 
//terminar $POST


?>





