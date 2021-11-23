<?php
function calc($a, $b) {
    if($a >= 0 && $b >= 0){
        echo "Разность чисел равна: ";
        return $a - $b;
    }elseif($a <0 && $b < 0 ){
        echo "Произведение чисел рaвно: ";
        return $a * $b;
    }
        echo"Сумма чисел равна: ";
        return $a + $b;
}

$res = calc(rand(-99, 99), rand(-99, 99));
echo $res;