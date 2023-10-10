<?php

    function LetraNIF($dni){
        return substr("TRWAGMYFPDXBNJZSQVHLCKEO", $dni%23, 1);
    }

    function dni_bien_escrito($texto){
        return strlen($texto)==9 && is_numeric(substr($texto,0,8)) && substr($texto,-1)>="A" && substr($texto,-1)<="Z";
    }

    function dni_valido($texto){
        $numero=substr($texto,0,8);
        $letra=substr($texto,-1);
        $valido=LetraNIF($numero)==$letra;
        return $valido;
    }

    if(isset($_POST["btnGuardarCambios"])){//compruebo errores
        $error_nombre=$_POST["nombre"]=="";
        $error_usuario=$_POST["usuario"]=="";
        $error_clave=$_POST["clave"]=="";
        $error_sexo=!isset($_POST["sexo"]);
        $error_dni=$_POST["dni"]=="" || !dni_bien_escrito(strtoupper(($_POST["dni"]))) || !dni_valido(strtoupper(($_POST["dni"])));
        $error_form=$error_nombre||$error_usuario||$error_clave||$error_sexo;
        $error_foto=$_FILES["foto"]["name"]!="" && ($_FILES["foto"]["error"] || !getimagesize($_FILES["foto"]["tmp_name"]) || $_FILES["foto"]["size"]>500*1024);
    }
/* if(isset($_POST["btnGuardarCambios"]) && !$error_foto){
    $nombre_unico=md5(uniqid(uniqid(),true));
    $array_nombre=explode(".",$_FILES["foto"]["name"]);
    $ext="";
    if(count($array_nombre)>1){
        $ext=end($array_nombre);
    }
    $nombre_unico.=".".$ext;
    @$var=move_uploaded_file($_FILES["foto"]["tmp_name"],"images/".$nombre_unico);
    if($var){
        echo "<h3>Información de la imagen seleccionada</h3>";
        echo "<p><strong>Error: </strong>".$_FILES["foto"]["error"]."</p>";
        echo "<p><strong>Nombre: </strong>".$_FILES["foto"]["name"]."</p>";
        echo "<p><strong>Ruta del foto en servidor: </strong>".$_FILES["foto"]["tmp_name"]."</p>";
        echo "<p><strong>Tipo: </strong>".$_FILES["foto"]["type"]."</p>";
        echo "<p><strong>Tamaño: </strong>".$_FILES["foto"]["size"]."</p>";
        echo "<p>La imagen ha sido subida con éxito</p>";
        echo "<p><img class='tam_imag' src='images/".$nombre_unico."' alt='Foto' title='Foto'/></p>";
    }else{
        echo "<p>No se ha podido mover la imagen a la carpeta destino</p>";
    }
} */

//Al pulsar el boton de Guardar Cambios
    if(isset($_POST["btnGuardarCambios"])&&!$error_form){
        require "vista_respuestas.php";
    }else{
        require "vista_formulario.php";
    }
    ?>