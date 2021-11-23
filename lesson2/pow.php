<?php
$a = rand(2, 10);
$b = rand(2, 10);

echo "Число = ". $a. "<br>";
echo "Степень = ". $b. "<br>";

function power($val, $pow){
    if($pow == 1) {
        return $val;
    }
    $res = $val * power($val, $pow - 1);
    return $res;
}
echo power($a, $b);