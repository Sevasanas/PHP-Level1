<?php

function translit($text) {
    $letters = [
        'а' => 'a', 
        'б' => 'b', 
        'в' => 'v', 
        'г' => 'g', 
        'д' => 'd', 
        'е' => 'e',
        'ё' => 'yo' ,
        'ж' => 'zh',
        'з' => 'z',
        'и' => 'i',
        'й' => 'y',
        'к' => 'k',
        'л' => 'l',
        'м' => 'm',
        'н' => 'n',
        'о' => 'o',
        'п' => 'p',
        'р' => 'r',
        'с' => 's',
        'т' => 't',
        'у' => 'u',
        'ф' => 'f',
        'х' => 'h',
        'ц' => 'c',
        'ч' => 'ch',
        'ш' => 'sh',
        "щ" => "s'h", 
        "ъ" => "",
        "ы" => "i", 
        "ь" => "'", 
        "э" => "e", 
        "ю" => "yu", 
        "я" => "ya", 
        " " => " "
    ];
    $text_str = preg_split('//u', $text, -1, PREG_SPLIT_NO_EMPTY);
    $text = '';

    foreach($text_str as $val) {
        $text .= (isset($letters[$val])) ? $letters[$val] : $val;
    }
    return $text;

    //return strtr(mb_strtolower($text), $letters);
}

function replace($text) {
    echo str_replace(" ", "_", $text);
};

function translitAndReplace($text) {
    return replace(translit($text));
}

$text = "Красота спасёт мир!<br>";
echo translit($text);
echo replace($text);
echo translitAndReplace($text);
    
