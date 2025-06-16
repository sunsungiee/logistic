<?php
require "components/header.php";
require "components/core.php";

include "functions/reg.php"

?>

<div class="container">
    <main>
        <h1 style="text-align: center; font-size: 50px">Регистрация</h1>
        <form action="" method="post">
            <br><br><br>
            <h3>Ваше ФИО</h3>
            <input type="text" name="fullname">
            <br>
            <h3>Номер телефона</h3>
            <input type="text" id="phone" name="phone">
            <br>
            <h3>Логин</h3>
            <input type="text" name="login">
            <br>
            <h3>Пароль</h3>
            <input type="password" name="password">
            <br>
            <?php
            if (isset($error)) {
                echo $error;
            }
            ?>
            <br>
            <button class="button">Зарегистрироваться</button>
            <br>
            <p><a href="auth.php">Авторизуйтесь,</a> если аккаунт уже есть</p>
        </form>
    </main>
</div>


<?php
include "components/footer.php";
?>

</body>

</html>