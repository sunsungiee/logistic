<?php

include "components/core.php";

if ($_POST) {
    $res = $link->query("INSERT INTO `feedback`( `message`) VALUES ('{$_POST["message"]}')");

    if ($res) {
?>
        <script>
            alert("Сообщение отправлено! Спасибо за обратную связь!");
        </script>
<?php
    } else {
        $error = "Ошибка отправления";
    }
}
