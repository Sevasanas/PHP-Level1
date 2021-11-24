<?php
$a = 0;
do {
    if($a == 0) {
        echo "$a - это ноль <br>";
        $a++;
    }elseif($a % 2 != 0) {
        echo "$a - нечётное число <br>";
        $a++;
    }else {
        echo "$a - чётное число <br>";
        $a++;
    }
} while($a < 11);