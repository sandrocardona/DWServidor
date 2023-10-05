<?php
$error_formulario = false;
$numero_corregido = "";

if (isset($_POST["btnGuardar"])) {
    $error_formulario = empty($input) || $input < 0 || $input > 5000;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ejercicio</title>
    <style>
        form {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: rgb(112, 210, 255);
        }

        p {
            width: 400px;
            margin: 0 auto;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: rgb(179, 255, 172);
        }
    </style>
</head>

<body>
    <form action="ej7_str.php" method="post">
        <label for="numero">Introduce el número a corregir:</label>
        <input type="text" name="numero" id="numero" required value="<?= isset($_POST['numero']) ? $_POST['numero'] : '' ?>">
        <input type="submit" value="Comprobar" name="submit">
    </form>

    <?php
    if (isset($_POST['submit']) && !$error_formulario) {
        $input = trim($_POST["numero"]);
        $numero_corregido = str_replace(',', '.', $input);
        echo "<p>El número corregido es: $numero_corregido</p>";
    }
    ?>
</body>

</html>