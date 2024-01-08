<?php
/* constantes */
define("USUARIO","jose");
define("CLAVE_BD","josefa");
define("SERVIDOR_BD","Localhost");
define("NOMBRE_BD","bd_libreria_exam");

function error_page($title, $body){
    echo
    "<!DOCTYPE html>
    <html lang='es'>
    <head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>".$title."</title>
    </head>
    <body>
    ".$body."
    </body>
    </html>";
}
?>