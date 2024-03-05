<?php
session_name("Examen2");
session_start();

require "./src/ctes.php";
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Examen2 23 24</title>
        <style>

        </style>
    </head>
    <body>
        <h1>Examen2 PHP Intento 4</h1>
        <h2>Horario de los Profesores</h2>
        <div>
            <form action="index.php" method="post">
                <label for="profesor">Horario del profesor:</label>
                <select name="profesor" id="profesor">
                    <?php
                    $url=DIR_SERV."/datos_profesores";
                    $respuesta=consumir_servicios_REST($url,"GET");
                    $obj=json_decode($respuesta);

                    /* si no existe el objeto */
                    if(!$obj){
                        echo "<p>".$respuesta."</p>";
                    }
                    /* si existe mensaje de error */
                    if(isset($obj->error)){
                        echo "<p>".$obj->error."</p>";
                    }

                    foreach ($obj->profesores as $tupla) {
                        if(isset($_POST["profesor"]) && ($_POST["profesor"]==$tupla->id_usuario))
                            echo "<option selected value=''>".$tupla->nombre."</option>";
                        else
                            echo "<option value=''>".$tupla->nombre."</option>";

                    }
                    ?>
                </select>
                <button name="btnVerHorario">Ver Horario</button>
            </form>
        </div>
        <?php
            if(isset($_POST["profesor"])){
                
            }
        ?>
    </body>
</html>