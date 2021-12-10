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

function productsNew($link, $name, $description, $price, $img){
    $t = "INSERT INTO pizza (name, description, price, img) VALUES ('%s', '%s', '%s', '%s')";

    $query = sprintf($t, mysqli_real_escape_string($link, $name),mysqli_real_escape_string($link, $description),mysqli_real_escape_string($link, $price),mysqli_real_escape_string($link, $img));

    $result = mysqli_query($link, $query);

    if(!$result) {
        die(mysqli_error($link));
    }

    return true;
}
function productsGet($link, $id){
    $query = sprintf("SELECT * FROM pizza WHERE id=%d", (int)$id);
    $result = mysqli_query($link, $query);

    if(!$result) {
        die(mysqli_error($link));
    }

    $product = mysqli_fetch_assoc($result);

    return $product;
}

function productsDelete($link, $id){
    $id = (int)$id;

    if($id == 0) {
        return false;
    }

    $query = sprintf("DELETE FROM pizza WHERE id='%d'", $id);
    $result = mysqli_query($link, $query);

    if(!$result) {
        die(mysqli_error($link));
    }
    return mysqli_affected_rows($link);
}

function productsEdit($link, $id, $name, $description, $price, $img){
    $id = (int)$id;

    $sql = "UPDATE pizza SET name='%s', description='%s', price='%s', img='%s' WHERE id='%d'";

    $query = sprintf($sql, mysqli_real_escape_string($link, $name), mysqli_real_escape_string($link, $description), mysqli_real_escape_string($link, $price), mysqli_real_escape_string($link, $img),$id);

    $result = mysqli_query($link, $query);

    if(!$result) {
        die(mysqli_error($link));
    }
    return mysqli_affected_rows($link);
}

