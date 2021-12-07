<?php
require_once "../config/config.php";



function productsAll($link){
    $query = "SELECT * FROM pizza ORDER BY id DESC";
    $result = mysqli_query($link, $query);

    if(!$result) {
        die(mysqli_error($link));
    }

    $products = [];

    while($data = mysqli_fetch_assoc($result)){
        $products[] = $data;
    }
    return $products;
}