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