<?php

if ($_POST) {
    $res = $link->query("SELECT * FROM `users` where `login` = '{$_POST['login']}' and `password` = '{$_POST['password']}'");
    if ($res) {
        if ($res->num_rows == 0) {
            $res = $link->query("INSERT INTO `users`(`fullname`, `phone`, `login`, `password`) VALUES (
            '{$_POST['fullname']}',
            '{$_POST['phone']}',
            '{$_POST['login']}',
            '{$_POST['password']}'
        )");
        }

        if ($res) {
            header("Location: auth.php");
        } else {
            $error = "Ошибка регистрации";
        }
    } else {
        $error = "Пользователь уже есть";
    }
}
