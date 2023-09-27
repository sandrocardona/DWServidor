<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      $ciudades=array("madrid","barcelona","londres");
      for($i=0; $i<count($ciudades); $i++){
        echo "<p>La ciudad con el indice ".$i." es ".$ciudades[$i]."</p>";
      }  
    ?>
</body>
</html>