<?php

function sum ($a, $b){
    return $a + $b;
}

function sub ($a, $b){
    return $a - $b;
}

function mult ($a, $b){
    return $a * $b;
}

function div ($a, $b){
    return ($b === 0) ? "invalid $b value (=0)" : $a / $b;
}

echo "Первый аргумент: ", $arg1 = rand(-99, 99), "<br>";
echo "Второй аргумент: ", $arg2 = rand(-99, 99), "<br>";
echo "Выбранная операция ", $operation = "*", "<br>";

function mathOperation($a, $b, $operation){
    switch($operation) {
        case "+" :
            return sum($a, $b);
            break;
        case "-" :
            return sub($a, $b);
            break;
        case "*" :
            return mult($a, $b);
            break;
        case "/" :
            return div($a, $b);
            break;
    }
}

echo  mathOperation($arg1, $arg2, $operation);

