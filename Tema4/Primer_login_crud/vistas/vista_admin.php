<?php

//funciones
function error_page($title,$body){//Crea una página web
    $page='<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>'.$title.'</title>
    </head>
    <body>
        '.$body.'
    </body>
    </html>';
    return $page;
}
function repetido($conexion,$tabla,$columna,$valor){
    try{
        $consulta="select * from ".$tabla." where ".$columna." = ".$valor."";//string que representa a la consulta
        $resultado=mysqli_query($conexion,$consulta);
        $respuesta=mysqli_num_rows($resultado)>0;
        mysqli_free_result($resultado);
    }
    catch(Exception $e){
        mysqli_close($conexion);
        return error_page("Práctica 1er CRUD","<h1>Práctica 1er CRUD</h1><p>No se ha podido conectar a la base:".$e->getMessage()."</p>");
    }
    return $respuesta;
}

/* FIN DE FUNCIONES */

if(isset($_POST["btnContEditar"]))
{
    //Errores cuándo edito
    $error_nombre=$_POST["nombre"]=="" || strlen($_POST["nombre"])>30;
    $error_usuario=$_POST["usuario"]==""|| strlen($_POST["usuario"])>20;
    if(!$error_usuario)
    {
        try{
            $conexion=mysqli_connect("localhost","jose","josefa","bd_foro_2");
            mysqli_set_charset($conexion,"utf8");
        }
        catch(Exception $e)
        {
            die(error_page("Práctica 1º CRUD","<h1>Práctica 1º CRUD</h1><p>No he podido conectarse a la base de batos: ".$e->getMessage()."</p>"));
        }
        $error_usuario=repetido_editando($conexion,"usuarios","usuario",$_POST["usuario"],"id_usuario",$_POST["btnContEditar"]);
            
         if(is_string($error_usuario))
            die($error_usuario);
    }
    $error_clave=strlen($_POST["clave"])>15;
    $error_email=$_POST["email"]=="" || strlen($_POST["email"])>50 || !filter_var($_POST["email"],FILTER_VALIDATE_EMAIL);
    if(!$error_email)
    {
        if(!isset($conexion))
        {
            try{
                $conexion=mysqli_connect("localhost","jose","josefa","bd_foro_2");
                mysqli_set_charset($conexion,"utf8");
            }
            catch(Exception $e)
            {
                die(error_page("Práctica 1º CRUD","<h1>Práctica 1º CRUD</h1><p>No he podido conectarse a la base de batos: ".$e->getMessage()."</p>"));
            }
        }
        $error_email=repetido_editando($conexion,"usuarios","email",$_POST["email"],"id_usuario",$_POST["btnContEditar"]);
        
        if(is_string($error_email))
            die($error_email);
    }

    $error_form=$error_nombre||$error_usuario||$error_clave||$error_email;

    if(!$error_form)
    {
        try{

            if($_POST["clave"]=="")
                $consulta="update usuarios set nombre='".$_POST["nombre"]."', usuario='".$_POST["usuario"]."', email='".$_POST["email"]."' where id_usuario='".$_POST["btnContEditar"]."'";
            else
                $consulta="update usuarios set nombre='".$_POST["nombre"]."', usuario='".$_POST["usuario"]."', clave='".md5($_POST["clave"])."', email='".$_POST["email"]."' where id_usuario='".$_POST["btnContEditar"]."'";
            
            mysqli_query($conexion,$consulta);
        }
        catch(Exception $e)
        {
            mysqli_close($conexion);
            die(error_page("Práctica 1º CRUD","<h1>Práctica 1º CRUD</h1><p>No se ha podido hacer la consulta: ".$e->getMessage()."</p>"));
        }
        
        mysqli_close($conexion);

        header("Location:index.php");
        exit;
        
    }

}

if(isset($_POST["btnContBorrar"]))
{
    try{
/*         $conexion=mysqli_connect(SERVIDOR_BD,USUARIO_BD,CLAVE_BD,NOMBRE_BD);*/
    
        $conexion=mysqli_connect("localhost","jose","josefa","bd_foro_2");
        mysqli_set_charset($conexion,"utf8");
    }
    catch(Exception $e)
    {
        die(error_page("Práctica 1º CRUD","<h1>Listado de los usuarios</h1><p>No ha podido conectarse a la base de batos: ".$e->getMessage()."</p>"));
    }

    try{
        $consulta="delete from usuarios where id_usuario='".$_POST["btnContBorrar"]."'";
        mysqli_query($conexion, $consulta);
    }
    catch(Exception $e)
    {
        mysqli_close($conexion);
        die(error_page("Práctica 1º CRUD","<h1>Listado de los usuarios</h1><p>No ha podido conectarse a la base de batos: ".$e->getMessage()."</p>"));
    }

    mysqli_close($conexion);
    header("Location:index.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 1º CRUD</title>
    <style>
        table,td,th{border:1px solid black}
        table{border-collapse:collapse;text-align:center}
        th{background-color:#CCC}
        table img{width:50px;}
        .enlace{border:none;background:none;cursor:pointer;color:blue;text-decoration:underline}
        .error{color:red}  
    </style>
</head>
<body>
    <h1>Listado de los usuarios</h1>
    <?php
    require "vistas_crud/vista_tabla.php";

    if(isset($_POST["btnDetalle"]))
    {
        require "vistas_crud/vista_detalle.php";
    }
    elseif(isset($_POST["btnBorrar"]))
    {
       require "vistas_crud/vista_conf_borrar.php";
    }
    elseif(isset($_POST["btnEditar"]) || isset($_POST["btnContEditar"]) )
    {
       require "vistas_crud/vista_editar.php";
    }
    else
    {
        require "vistas_crud/vista_nuevo.php";
    }
    
    mysqli_close($conexion);

    ?>
</body>
</html>