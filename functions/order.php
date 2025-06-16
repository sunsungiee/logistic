<?php

if ($_POST) {
    if (isset($_POST['product_id'])) {
        $res = $link->query("INSERT INTO `orders`(`user_id`, `volume`, `product_id`, `storage_period`, `order_date`) VALUES (
        '{$_SESSION['user']['id']}',
        '{$_POST['volume']}',
        '{$_POST['product_id']}',
        '{$_POST['storage_period']}',
        '{$_POST['order_date']}'
    )");

        if ($res) {
            echo "<script> alert('Заказ оформлен!'); </script>";
            header("Location: order.php");
        } else {
            $error = "Ошибка оформления заказа";
        }
    }
}
