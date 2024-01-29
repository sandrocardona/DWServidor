<?php

define("SERVIDOR_BD","localhost");
define("USUARIO_BD","jose");
define("CLAVE_BD","josefa");
define("NOMBRE_BD","bd_tienda");


/* OBTENER PRODUCTOS */

function obtener_productos(){
    try{
        $conexion=new PDO("mysql:host=".SERVIDOR_BD.";dbname=".NOMBRE_BD,USUARIO_BD,CLAVE_BD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")); //la sentencia entre paréntesis no hay que memorizarla
    }
    catch(PDOException $e){

        return array("mensaje_error"=>"no se ha podido conectar a la BD: ".$e->getMessage());
    }

    try{
      $consulta="select * from producto";
      $sentencia=$conexion->prepare($consulta);
      $sentencia->execute();
    }
    catch(PDOException $e){
        $sentencia=null;
        $conexion=null;
        return array("mensaje_error"=>"no se ha podido realizar consulta: ".$e->getMessage());
    }

    $respuesta["productos"]=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    $sentencia=null;
    $conexion=null;
    return $respuesta;
}

/* OBTENER PRODUCTO */

function obtener_producto($codigo){
    try{
        $conexion=new PDO("mysql:host=".SERVIDOR_BD.";dbname=".NOMBRE_BD,USUARIO_BD,CLAVE_BD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")); //la sentencia entre paréntesis no hay que memorizarla
    }
    catch(PDOException $e){

        return array("mensaje_error"=>"no se ha podido conectar a la BD: ".$e->getMessage()." en obtener producto");
    }

    try{
      $consulta="select * from producto where cod=?";
      $sentencia=$conexion->prepare($consulta);
      $sentencia->execute([$codigo]);
    }
    catch(PDOException $e){
        $sentencia=null;
        $conexion=null;
        return array("mensaje_error"=>"no se ha podido realizar consulta: ".$e->getMessage()." en obtener producto");
    }

    if($sentencia->rowCount()>0)
        $respuesta["producto"]=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    else
        $respuesta["mensaje"]="El producto con codigo: ".$codigo." en obtener_producto() no se encuentra en la BD";

    $sentencia=null;
    $conexion=null;

    return $respuesta;
}

/* INSERTAR PRODUCTO */

function insertar_producto($datos){
    try{
        $conexion=new PDO("mysql:host=".SERVIDOR_BD.";dbname=".NOMBRE_BD,USUARIO_BD,CLAVE_BD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")); //la sentencia entre paréntesis no hay que memorizarla
    }
    catch(PDOException $e){

        return array("mensaje_error"=>"no se ha podido conectar a la BD: ".$e->getMessage()." en insertar producto");
    }

    try{
      $consulta="insert into producto(cod,nombre,nombre_corto,descripcion,PVP,familia) values (?,?,?,?,?,?)";
      $sentencia=$conexion->prepare($consulta);
      $sentencia->execute($datos);
    }
    catch(PDOException $e){
        $sentencia=null;
        $conexion=null;
        return array("mensaje_error"=>"no se ha podido realizar consulta: ".$e->getMessage()." en insertar producto");
    }

    $respuesta["mensaje"]="El producto se ha instertado correctamente";
    $sentencia=null;
    $conexion=null;
    return $respuesta;
}

/* ACTUALIZAR PRODUCTO */

function actualizar_producto(){
    try{
        $conexion=new PDO("mysql:host=".SERVIDOR_BD.";dbname=".NOMBRE_BD,USUARIO_BD,CLAVE_BD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")); //la sentencia entre paréntesis no hay que memorizarla
    }
    catch(PDOException $e){

        return array("mensaje_error"=>"no se ha podido conectar a la BD: ".$e->getMessage()." en actualizar producto");
    }

    try{
      $consulta="update producto set nombre=?, nombre_corto=?, descripcion=?, PVP=?, familia=? where cod=?";
      $sentencia=$conexion->prepare($consulta);
      $sentencia->execute();
    }
    catch(PDOException $e){
        $sentencia=null;
        $conexion=null;
        return array("mensaje_error"=>"no se ha podido realizar consulta: ".$e->getMessage()." en actualizar producto");
    }

    $respuesta["mensaje"]="El producto se ha actualizado correctamente";
    $sentencia=null;
    $conexion=null;
    return $respuesta;
}

/* BORRAR PRODUCTO */

function borrar_producto(){
    try{
        $conexion=new PDO("mysql:host=".SERVIDOR_BD.";dbname=".NOMBRE_BD,USUARIO_BD,CLAVE_BD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")); //la sentencia entre paréntesis no hay que memorizarla
    }
    catch(PDOException $e){

        return array("mensaje_error"=>"no se ha podido conectar a la BD: ".$e->getMessage()." en borrar producto");
    }

    try{
      $consulta='delete from producto where cod=?';
      $sentencia=$conexion->prepare($consulta);
      $sentencia->execute();
    }
    catch(PDOException $e){
        $sentencia=null;
        $conexion=null;
        return array("mensaje_error"=>"no se ha podido realizar consulta: ".$e->getMessage()." en borrar producto");
    }


    $respuesta["mensaje"]="El producto se ha borrado correctamente";
    $sentencia=null;
    $conexion=null;
    return $respuesta;
}

/* REPETIDO */

function repetido($tabla,$columna,$valor){
    try{
        $conexion=new PDO("mysql:host=".SERVIDOR_BD.";dbname=".NOMBRE_BD,USUARIO_BD,CLAVE_BD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")); //la sentencia entre paréntesis no hay que memorizarla
    }
    catch(PDOException $e){

        return array("mensaje_error"=>"no se ha podido conectar a la BD: ".$e->getMessage()." en repetido");
    }

    try{
      $consulta='select * from '.$tabla.' where '.$columna.'=?';
      $sentencia=$conexion->prepare($consulta);
      $sentencia->execute();
    }
    catch(PDOException $e){
        $sentencia=null;
        $conexion=null;
        return array("mensaje_error"=>"no se ha podido realizar consulta: ".$e->getMessage()." en borrar producto");
    }


    $respuesta["repetido"]=($sentencia->rowCount())>0;
    $sentencia=null;
    $conexion=null;
    return $respuesta;
}

/* OBTENER FAMILIAS */

function obtener_familias(){
    try{
        $conexion=new PDO("mysql:host=".SERVIDOR_BD.";dbname=".NOMBRE_BD,USUARIO_BD,CLAVE_BD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")); //la sentencia entre paréntesis no hay que memorizarla
    }
    catch(PDOException $e){

        return array("mensaje_error"=>"no se ha podido conectar a la BD: ".$e->getMessage());
    }

    try{
      $consulta="select * from familia";
      $sentencia=$conexion->prepare($consulta);
      $sentencia->execute();
    }
    catch(PDOException $e){
        $sentencia=null;
        $conexion=null;
        return array("mensaje_error"=>"no se ha podido realizar consulta: ".$e->getMessage());
    }

    $respuesta["familias"]=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    $sentencia=null;
    $conexion=null;
    return $respuesta;
}

?>