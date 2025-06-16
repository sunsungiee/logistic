<?php

if ($_POST) {
    $res = $link->query("SELECT * FROM `users` where `login` = '{$_POST['login']}' and `password` = '{$_POST['password']}'");
    if ($res) {
        if ($res->num_rows != 0) {
            $_SESSION['user'] = $res->fetch_assoc();
            header("Location: index.php");
        } else {
            $error = "Пользователь не найден";
        }
    } else {
        $error = "Пользователь не найден";
    }
}
