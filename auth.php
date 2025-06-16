<?php
require "components/header.php";
require "components/core.php";

include "functions/auth.php"
?>

<div class="container">
    <main>
        <h1 style="text-align: center; font-size: 50px">Авторизация</h1>
        <form action="" method="post">
            <br><br><br>
            <h3>Логин</h3>
            <input type="text" name="login" required>
            <br>
            <h3>Пароль</h3>
            <input type="password" name="password" required>
            <br>
            <?php
            if (isset($error)) {
                echo $error;
            }
            ?><br>
            <button class="button">Войти</button>
            <br>
            <p><a href="reg.php">Зарегистрируйтесь,</a> если еще нет аккаунта</p>
        </form>
    </main>
</div>
<?php
include "components/footer.php";
?>
</body>

</html>