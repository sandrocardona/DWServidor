<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,td,th{border:1px solid black;}
        table{border-collapse:collapse;text-align:center;width:90%;margin: 0 auto;}
        th{background-color:lightgrey;}
        .enlace{border:none;background:none;color:blue;text-decoration:underline;}
        h1,h2{text-align:center;}
        img{width: 75px;height: auto;}
    </style>
</head>
<body>
    <h1>VideoClub</h1>
    <h2>Listado de películas</h2>
    <?php
        /* Si no hay conexión, me conecto a la base de datos */
        if(!isset($conexion)){
            try{
                $conexion=mysqli_connect(DIRECCION,USUARIO,PASSWORD,BASE_DATOS);
                mysqli_set_charset($conexion, "utf8");
            }
            catch(Excepcion $e){
                echo "<p>No se ha podido conectar a la BD: ".$e->getMessage()."</p>";
            }
        }
        /* Realizo la consulta */
        try{
            $consulta = "select * from peliculas";
            $resultado=mysqli_query($conexion, $consulta);
        }
        catch(Excepcion $e){
            echo "<p>No se ha podido realizar la consulta: ".$e -> getMessage()."</p>";
        }
    ?>
    <table>
        <tr>
            <th>Id</th>
            <th>Título</th>
            <th>Carátula</th>
            <th><button class='enlace'>Películas +</button></th>
        </tr>
        <?php
        while($tupla=mysqli_fetch_assoc($resultado)){
            echo "<tr>";
            echo "<td>".$tupla["idPelicula"]."</td>";
            echo "<td>".$tupla["titulo"]."</td>";
            echo "<td><img src='Img/".$tupla["caratula"]."'</td>";
            echo "<td><form action='index.php' method='post'><button class='enlace' type='submit' value='".$tupla["idPelicula"]."'>Borrar</button> - <button class='enlace' type='submit' value='".$tupla["idPelicula"]."'>Editar</button></form></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <?php
    mysqli_free_result($resultado);
    mysqli_close($conexion);
    ?>
</body>
</html>