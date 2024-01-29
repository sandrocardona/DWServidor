<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Web Prueba de Servicios</title>
</head>
<body>
    <?php
    //url clase
/*     define("DIR_SERV","http://localhost/Proyectos/DWServidor/TEMA6/Servicios_web/Ejercicio1/servicios_rest");
 */    //url casa
    define("DIR_SERV","http://localhost/DAW/DWES/DWServidor.git/TEMA6/Servicios_web/Ejercicio1/servicios_rest");

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
    
    $datos["cod"]="AAAAAA";
    $datos["nombre"]="insertado";
    $datos["nombre_corto"]="ins";
    $datos["descripcion"]="no muerto";
    $datos["PVP"]=50;
    $datos["familia"]="camara";

    $url=DIR_SERV."/familias";
    $respuesta=consumir_servicios_REST($url,"GET");
    $obj=json_decode($respuesta);

    if(!$obj)
        die("<p>Error consumiendo el servicio: ".$url."</p>".$respuesta);

    if(isset($obj->mensaje_error))
        die("<p>".$url."</p>".$respuesta);

        foreach($obj->familias as $tupla)
        {
            echo "<p>".$tupla->nombre."</p>";
        }

    $url=DIR_SERV."/producto/".urlencode("3DSNG");
    $respuesta=consumir_servicios_REST($url,"GET");
    $obj=json_decode($respuesta);

    if(!$obj)
        die("<p>Error consumiendo el servicio: ".$url."</p>".$respuesta);

    if(isset($obj->mensaje_error))
        die("<p>".$url."</p>".$respuesta);

/*         echo "<p>".$respuesta."</p>"; */

    echo "<p>".$obj->producto[0]->nombre_corto."</p>";

    $url=DIR_SERV."/producto/insertar";
    $respuesta=consumir_servicios_REST($url, "POST", $datos);
    $obj=json_decode($respuesta);

    if(!$obj)
        die("<p>Error consumiendo el servicio: ".$url."</p>".$respuesta);
    
    if(isset($obj->mensaje_error)) 
        die("<p>".$url."</p>".$respuesta);

    echo "<p>".$obj->mensaje."</p>";
    ?>
</body>
</html>