<?php
$districts = [
    "Московская область" => ["Москва", "Зеленоград", "Клин"],
    "Ленинградская область" => ["Санкт-Петербург", "Всеволжск", "Павловск", "Кронштадт"],
    "Пензенская область" => ["Пенза", "Кузнецк", "Никольск", "Городище"]
];


/*function outputCity($arr) {
    foreach($arr as $key => $value) {
        echo "<br> $key :<br>";
        for($i = 0; $i < $arrLength = count($arr[$key]); $i++) {
            if($i == $arrLength - 1) {
                $cities = implode(",", $arr[$key]);
                echo $cities ."<br>";
            }
        }
    }
}*/

foreach($districts as $key => $value){
    $str = implode(',', $value) .".";
    echo "$key: <br>$str<br>";
}

function searchCity($char, $arr) {
    $wrongCity = 0;
    $cityCount = count($arr, COUNT_RECURSIVE) - count($arr);
    foreach($arr as $key => $value) {
        for($i = 0; $i < count($arr[$key]); $i++) {
            $searchLetter = preg_split('//u', $arr[$key][$i], 0, PREG_SPLIT_NO_EMPTY);
            if($searchLetter[0] == $char) {
                echo implode($searchLetter) . "<br>";
            }else{
                $wrongCity++;
                if ($wrongCity == $cityCount) {
                    return print "<br>Города на букву '{$char}' в массиве нет.";
                }
            }
        }
    }
}

//outputCity($districts);
searchCity('К', $districts);

