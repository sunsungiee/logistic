<?php

function calculate_price($product_type, $volume, $time)
{
    switch ($product_type) {
        case 1:
            $res = 15 * $volume + $time * 50;
            $daily = round($res / $time, 0);
            break;
        case 2:
            $res = 10 *  $volume + $time * 50;
            $daily = round($res / $time, 0);
    }

    $calc_res = [$res, $daily];

    return $calc_res;
}

if ($_POST) {
    $price =  calculate_price($_POST['category'], $_POST['volume'], $_POST['time']);
}
