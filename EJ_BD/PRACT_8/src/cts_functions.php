<?php
define("SERVIDOR_BD","localhost");
define("USUARIO_BD","jose");
define("CLAVE_BD","josefa");
define("NOMBRE_BD","bd_cv");

/* define("SERVIDOR_BD","localhost");
define("USUARIO_BD","root");
define("CLAVE_BD","");
define("NOMBRE_BD","clientes_php"); */

function LetraNIF ($dni) {
    $valor= (int) ($dni / 23);
    $valor *= 23;
    $valor= $dni - $valor;
    $letras= "TRWAGMYFPDXBNJZSQVHLCKEO";
    $letraNif= substr ($letras, $valor, 1);
    return $letraNif;
   }

function dni_bien_escrito($texto){
    return strlen($texto) == 9 && is_numeric(substr($texto, 0, 8)) && substr($texto, -1) >= 'A' && substr($texto, -1) <= 'Z';
}

function dni_valido($texto){
    $numero = substr($texto, 0 , 8);
    $letra = substr($texto, -1);
    $valido = LetraNIF(dni: $numero) == $letra;
    return $valido;
}
?>