<?php
define("SERVIDOR","localhost");
define("NOMBRE","root");
define("PWD","");
define("BD","bd_exam_colegio");

function error_form($title,$body){
    $page="<!DOCTYPE html>
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
    return $page;
}



?>