<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    define("DIR_SERV","http://localhost/Proyectos/DWServidor/TEMA5/Teor_SW/primera_api/");

    function consumir_servicios_REST($url,$metodo,$datos=null)
    {
        $llamada=curl_init();
        curl_setopt($llamada,CURLOPT_URL,$url);
        curl_setopt($llamada,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($llamada,CURLOPT_CUSTOMREQUEST,$metodo);
        if(isset($datos))
            curl_setopt($llamada,CURLOPT_POSTFIELDS,http_build_query($datos));
        $respuesta=curl_exec($llamada);
        curl_close($llamada);
        return $respuesta;
    }

    $url=DIR_SERV."/saludo/".urlencode("Maria Antonia");

    $respuesta=consumir_servicios_REST($url,"GET");
    $obj=json_decode(($respuesta));
    if(!$obj){
        die("<p>Error en el servicio: ".$url."</p>".$respuesta);
    }
    echo "<p>El saludo recibido ha sido: ".$obj->mensaje."</p>";

    $url=DIR_SERV."/saludo";
    $datos["nombre"]="Juan Alonso";
    $respuesta=consumir_servicios_REST($url,"POST", $datos);
    $obj=json_decode($respuesta);
    if(!$obj){
        die("<p>Error en el servicio: ".$url."</p>".$respuesta);
    }
    echo "<p>El saludo recibido ha sido: ".$obj->mensaje."</p>";
    ?>
</body>
</html>