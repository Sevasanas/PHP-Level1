<?php
$districts = [
    "Московская область" => ["Москва", "Зеленоград", "Клин"],
    "Ленинградская область" => ["Санкт-Петербург", "Всеволжск", "Павловск", "Кронштадт"],
    "Пензенская область" => ["Пенза", "Кузнецк", "Никольск", "Городище"]
];


function outputCity($arr) {
    foreach($arr as $key => $value) {
        echo "<br> $key :<br>";
        for($i = 0; $i < $arrLength = count($arr[$key]); $i++) {
            if($i == $arrLength - 1) {
                $cities = implode(",", $arr[$key]);
                echo $cities;
            }
        }
    }
}

outputCity($districts);

