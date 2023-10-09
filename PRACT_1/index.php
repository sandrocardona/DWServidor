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
        $error_apellidos=$_POST["apellidos"]=="";
        $error_clave=$_POST["clave"]=="";
        $error_sexo=!isset($_POST["sexo"]);
        $error_comentarios=$_POST["comentarios"]=="";
        $error_dni=$_POST["dni"]=="" || !dni_bien_escrito(strtoupper(($_POST["dni"]))) || !dni_valido(strtoupper(($_POST["dni"])));
        $error_form=$error_nombre||$error_apellidos||$error_clave||$error_sexo||$error_comentarios;
        $error_archivo=$_FILES["foto"]["name"]!="" && ($_FILES["foto"]["error"] || !getimagesize($_FILES["foto"]["tmp_name"]) || $_FILES["foto"]["size"]>500*1024);
        $error_foto=$_FILES["foto"]["name"]!="" && ($_FILES["foto"]["error"] || !getimagesize($_FILES["foto"]["tmp_name"]) || $_FILES["foto"]["size"]>500*1024);
    }

    $nombre_unico=md5(uniqid(uniqid(),true));
    $array_nombre=explode(".",$_FILES["foto"]["name"]);
    $text="";
    if(count($array_nombre)>1){
        $ext=end($array_nombre);
    }
    $nombre_unico.=".".$ext;
    @$var=move_uploaded_file($_FILES["foto"]["tmp_name"],"images/".$nombre_unico);
    if($var){

    }else{
        echo "<p>No se ha podido mover la imagen a la carpeta destino</p>";
    }

    if(isset($_POST["btnGuardarCambios"])&&!$error_form){
        require "vista_respuesta.php";
    }else{
        require "vista_formulario.php";
    }
    ?>