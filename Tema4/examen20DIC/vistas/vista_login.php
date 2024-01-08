<form action="index.php" method="post">
        <p>
        <label for="user">Usuario: </label>
        <input type="text" name="user" id="user" maxlength="11">
        <?php
        if(isset($_POST["btnEntrar"]) && $error_user){
            echo "<span class='error'>Campo obligatorio</span>";
        }
        ?>
        </p>
        <p>
        <label for="pwd">Contraseña: </label>
        <input type="text" name="pwd" id="user" maxlength="50">
        <?php
        if(isset($_POST["btnEntrar"]) && $error_pwd){
            echo "<span class='error'>Campo obligatorio</span>";
        }
        ?>
        </p>
        <p>
            <button type="submit" name="btnEntrar" id="btnEntrar">Entrar</button>
        </p>
    </form>