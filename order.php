<?php
require "components/header.php";
require "components/core.php";

if (isset($_POST['id'])) {
    $res = $link->query("DELETE FROM `states` WHERE `id` = '{$_POST['id']}'");
    header("Location: order.php");
}

$orders = $link->query("SELECT * FROM `orders` WHERE `user_id` =  '{$_SESSION['user']['id']}'ORDER BY id DESC");

include "functions/order.php"

?>
<div class="order_container">
    <br><br>
    <h1>Мои заказы</h1>
    <br>
    <hr class="section_hr">
    <?php

    if ($orders) {
        if ($orders->num_rows != 0) {
    ?>
            <div class="orders">
                <?php
                foreach ($orders as $order) {
                    $status_res = $link->query("SELECT * FROM `statuses` WHERE `id` =  '{$order['status_id']}'");
                    $status = $status_res->fetch_assoc();
                    $product_res = $link->query("SELECT * FROM `products` WHERE `id` =  '{$order['product_id']}'");
                    $product = $product_res->fetch_assoc();

                ?>

                    <div class="order">
                        <h2>Заказ № <?= $order['id'] ?></h2>
                        <br>
                        <p><b>Категория:</b> <?= $product['product'] ?></p>
                        <p><b>Объем хранения:</b> <?= $order['volume'] ?> м³</p>
                        <p><b>Срок хранения:</b> <?= $order['storage_period'] ?> дня</p>
                        <p><b>Дата:</b> <?= $order['order_date'] ?></p>
                        <br>
                        <p><b>Сатус:</b> <?= $status['status'] ?></p>
                        <?php
                        if ($status == "Новое") {
                        ?>
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?= $order['id'] ?>">
                                <button style="padding: 5px 10px;">Отменить</button>
                            </form>
                        <?php
                        }
                        ?>

                    </div>

                <?php
                }
                ?>
            </div>

        <?php
        } else {
        ?>
            <div class="empty_res_message">
                <p>Похоже, заказов пока нет...</p>
            </div>
        <?php
        }
    } else {
        ?>
        <div class="empty_res_message">
            <p>Похоже, заказов пока нет...</p>
        </div>
    <?php
    }
    ?>

    <div class="container">
        <main>
            <h1 style="text-align: center">Новый заказ на хранение товара</h1>
            <br>
            <hr class="section_hr">
            <form action="" method="post">
                <br><br><br>
                <h3>Вид товара / груза</h3>
                <select name="product_id" id="category" required>
                    <option value="1">Продукты питания</option>
                    <option value="2">Промтовары</option>
                </select>
                <br>
                <h3>Объём партии</h3>
                <p>Какое количество товара планируете разместить (м³)?</p>
                <input type="text" maxlength="2" pattern="[0-9]+" title="Введите только число" name="volume" required>
                <br>
                <h3>Срок хранения</h3>
                <p>На какой срок планируете разместить товары (в днях)?</p>
                <input type="text" maxlength="3" pattern="[0-9]+" title="Введите только число дней" name="storage_period" required>
                <br>
                <h3>Дата завоза</h3>
                <p>Когда вы планируете разместить товар?</p>
                <input type="date" name="order_date" min="2025-04-05" required>
                <br>
                <br><br>
                <button class="button">Оформить</button>

                <?php
                if (isset($error)) {
                    echo $error;
                }
                ?>
            </form>
        </main>
    </div>
</div>
<?php
include "components/footer.php";
?>
</body>

</html>