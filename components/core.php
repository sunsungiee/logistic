<?php 

$link = new mysqli("localhost", "root", "", "logcomplex");

$link->set_charset('utf8mb4');

if (!$link) {
    die("Нет подключения к базе данных");
}