<?php
$H = 20;
for ($i = 1; $i <= $H; $i++) {
    for ($k = $H; $k > $i; $k--) {
        echo "&nbsp;&nbsp";
    }
    for($j = 1; $j <= $i * 2 - 1; $j++) {
        if ($i == 1 || $i == $H || $j == 1 || $j == $i * 2 - 1) {
            echo "*";
        }else {
            echo"&nbsp;&nbsp";
        }
    }
    echo "<br/>";
}