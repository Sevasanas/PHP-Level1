<?php
include "functions.php";




$name = strip_tags($_POST['name']);
$price = strip_tags($_POST['price']);
$description = strip_tags($_POST['description']);


$path = "../public/img/big/".$_FILES['photo']['name'];//указали путь для загузки изображения нового авто
move_uploaded_file($_FILES['photo']['tmp_name'], $path);

if(updateGood($link,$name,$price,$description,$_FILES['photo']['name'],$_POST['id']) == 1){
    header("Location: /?page=edit_good&success=1");
}
else{
    header("Location: /?page=edit_good&success=2");
}
