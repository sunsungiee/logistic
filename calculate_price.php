<?php
require "components/header.php";

include "functions/calculate.php"

?>

<div class="container">
    <main>
        <h1 style="text-align: center; font-size: 50px">Рассчитать стоимость</h1>
        <br>
        <hr class="section_hr">
        <form action="" method="post" class="calc_form">
            <br><br><br>
            <h3>Вид товара / груза</h3>
            <br>
            <select name="category" id="category">
                <option value="1">Продукты питания</option>
                <option value="2">Промтовары</option>
            </select>
            <br>
            <h3>Объём партии</h3>
            <p>Какое количество товара планируете разместить (м³)?</p>
            <br>
            <input type="text" maxlength="2" pattern="[0-9]+" title="Введите только число" name="volume" required>
            <br>
            <h3>Срок хранения</h3>
            <p>На какой срок планируете разместить товары (в днях)?</p>
            <br>
            <input type="text" maxlength="3" pattern="[0-9]+" title="Введите только число дней" name="time">
            <br><br>
            <button class="button">Рассчитать</button>

            <?php
            if (isset($price)) {
            ?>
                <div class="calc_result">
                    <p>Стоимость услуги составит</p>
                    <h1><?= $price[0]; ?> руб.</h1>
                    <br>
                    <p>В день вы платите <?= $price[1] ?> рублей</p>
                </div>
            <?php
            }
            ?>
        </form>



    </main>
</div>


<?php
include "components/footer.php";
?>

</body>

</html>