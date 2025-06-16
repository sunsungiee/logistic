<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ТД Шкуренко</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/icon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>

    <header>
        <div class="container">
            <h1><a href="index.php" class="logo">ТД Шкуренко</a></h1>

            <div>
                <p><a href="index.php#about_us">О нас</a></p>
                <p><a href="index.php#contacts">Контакты</a></p>
                <p><a href="index.php#offer">Что мы предлагаем</a></p>
                <p><a href="index.php#user_form">Обратная связь</a></p>
            </div>

            <div>
                <p><a href="calculate_price.php" class="action_btn">Рассчитать стоимость</a></p>
                <?php
                if (isset($_SESSION['user'])) {
                    if ($_SESSION['user']['role_id'] == '2') {
                ?>
                        <p><a href="admin.php" class="action_btn">Админ панель</a></p>
                    <?php
                    } else {
                    ?>
                        <p><a href="order.php" class="action_btn">Оформить заказ</a></p>
                    <?php
                    }
                    ?>
                    <p><a href="logout.php" class="action_btn">Выйти</a></p>
                <?php
                } else {
                ?>
                    <p><a href="auth.php" class="action_btn">Войти</a></p>
                <?php
                }
                ?>
            </div>
        </div>
    </header>