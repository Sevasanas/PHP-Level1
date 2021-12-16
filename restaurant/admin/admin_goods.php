<?php
include "../models/functions.php";

$name = strip_tags($_POST['name']);
$price = strip_tags($_POST['price']);
$description = strip_tags($_POST['description']);


$path = "../public/img/big".$_FILES['photo']['name'];//указали путь для загузки изображения нового авто
move_uploaded_file($_FILES['photo']['tmp_name'], $path);

if(addGood($link,$title,$price,$description,$_FILES['photo']['name']) == 1){
    header("Location: /?page=add_good&success=1");
}
else{
    header("Location: /?page=add_good&success=2");
}