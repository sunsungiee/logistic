<?php
require "components/header.php";
require "components/core.php";

if (isset($_POST['id'])) {
    switch ($_POST['status']) {
        case "ok":
            $res = $link->query("UPDATE `orders` SET `status_id`=2 WHERE `id` = '{$_POST['id']}'");
            break;
        case "done":
            $res = $link->query("UPDATE `orders` SET `status_id`=3 WHERE `id` = '{$_POST['id']}'");
            break;
        case "reject":
            $res = $link->query("UPDATE `orders` SET `status_id`= '4', `cancel_reason` = '{$_POST['comment']}' WHERE `id` = '{$_POST['id']}'");
            if (!$res) {
                die($link->error);
            }
            break;
    }

    header("Location: admin.php");
}

$orders = $link->query("SELECT * FROM `orders` WHERE `status_id` != 4");

$feedback = $link->query("SELECT * FROM `feedback` WHERE 1");

// var_dump($feedback);

?>

<div class="container">
    <main>
        <h1 style="text-align: center; font-size: 50px">Админ панель</h1>
        <br><br>
        <h1 style="text-align: center; font-size: 30px">Активные заявки</h1>
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

                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?= $order['id'] ?>">
                                <br>
                                <div class="buttons">
                                    <button style="padding: 5px 10px;" name="status" value="ok">Принято</button> <br>
                                    <button style="padding: 5px 10px;" name="status" value="done">Выполнено</button> <br>
                                    <button type="button" style="padding: 5px 10px;" id="cancel">Отменить</button>
                                </div>
                                <div id="comment_section">
                                    <br>
                                    <textarea name="comment" cols="30" rows="10" placeholder="Оставьте причину отмены заявки"></textarea>
                                    <br>
                                    <button style="margin: auto; width: 100%;" name="status" value="reject">Отправить</button>
                                </div>
                            </form>
                        </div>

                    <?php
                    }
                    ?>
                </div>
            <?php
            } else {
            ?>
                <div class="empty_res_message">
                    <p>Похоже, активных заявок пока нет...</p>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="orders">
                <p>Похоже, активных заявок пока нет...</p>
            </div>
        <?php
        }
        ?>
        <hr class="section_hr">
        <br>
        <h1 style="text-align: center; font-size: 30px">Обратная связь</h1>
        <?php
        if ($feedback) {
            if ($feedback->num_rows > 0) {
                foreach ($feedback as $message) {
        ?>
                    <div class="msg order">
                        <h2>Сообщение № <?= $message['id'] ?></h2>
                        <p><?= $message['message']; ?></p>
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="empty_res_message">
                    <p>Похоже, сообщений пока нет...</p>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="empty_res_message">
                <p>Похоже, сообщений пока нет...</p>
            </div>
        <?php }
        ?>
    </main>
</div>


<?php
include "components/footer.php";
?>
<script src="./js/jquery-3.7.1.min.js"></script>
<script src="./js/jquery.maskedinput.min.js"></script>
<script>
    document.getElementById("cancel").addEventListener("click", function() {
        const section = document.getElementById("comment_section");
        section.style.display = (section.style.display === "none") ? "block" : "none";
    });
</script>
</body>

</html>