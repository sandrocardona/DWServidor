<?php
/* constantes */
define("USER","jose");
define("PWD","josefa");
define("SERVER","Localhost");
define("DB","bd_libreria_exam");

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