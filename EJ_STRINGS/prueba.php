<?php
$error_formulario = false;
$palabra = "";

if (isset($_POST["btnGuardar"])) {
    $palabra = trim($_POST["palabra"]);

    $error_formulario = empty($palabra) || $palabra < 0 || $palabra > 5000;
    if (!$error_formulario) {
        $acentos = array('á', 'Á', 'ä', 'Ä', 'é', 'É', 'ë', 'Ë', 'í', 'Í', 'ï', 'Ï', 'ó', 'Ó', 'ö', 'Ö', 'ú', 'Ú', 'ü', 'Ü');
        $sin_acentos = array('a', 'A', 'a', 'A', 'e', 'E', 'e', 'E', 'i', 'I', 'i', 'I', 'o', 'O', 'o', 'O', 'u', 'U', 'u', 'U');
        $palabra = str_replace($acentos, $sin_acentos, $palabra);
    }
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
    <form action="prueba.php" method="post">
        <label for="palabra">Introduce texto:</label>
        <textarea name="palabra" id="palabra" cols="30" rows="10" required><?= $palabra ?></textarea>
        <input type="submit" value="Comprobar" name="submit">
    </form>

    <?php
    if (isset($_POST['submit']) && !$error_formulario) {
        echo "<p>La palabra sin acentos es: $palabra</p>";
    }
    ?>
</body>

</html>