<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $sum=0;
        $media=0;
        $arr=array();
        for($i=0; $i<10; $i++){
            array_push($arr, $i+1);
        }

        for($i=0; $i<count($arr);$i+=2){
            $sum+=$arr[$i];
        }
        print_r($arr);
        echo $sum;
        echo $media;
    ?>
</body>
</html>