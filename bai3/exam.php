<?php
$phicodinh = 25000;
$sophut = 100;

if ($sophut > 200) {
    echo "Phí phải trả: " . (($sophut - 200) * 200 + 150 * 400 + 50 * 600);
} else if ($sophut > 50 && $sophut < 200) {
    echo $sophut * 400 + 50 * 600;
} else if ($sophut < 50) {
    echo $sophut * 600;
} else {
    echo $phicodinh;
}
