<?php
session_start();
//Это файл помещает товар в корзину
include "../models/functions.php";
include "../config/config.php";
$id = (int)($_GET['id']);

$sql = "SELECT * FROM cart WHERE id_good = $id and id_user=".$_SESSION['id_user'];//ищем добавляемый товар в корзине
//если он существует уже в корзине, то мы обновим поле количество, увеличивая count на 1.
//А если такого товара в базе нет, то мы его вставляем в базу.
$res = mysqli_query($link,$sql);


if(mysqli_num_rows($res) > 0){
    $s = "UPDATE cart SET count=count+1 WHERE id_good=$id";
    $res = mysqli_query($link,$s);
   
}
else{
    $s = "INSERT INTO cart(id_good,count,id_user,status) VALUES($id,1,".$_SESSION['id_user'].",0)";
    $res = mysqli_query($link,$s);
   
}

if($res){
    header("Location: /index.php?page=prices&success=1");//если запрос успешно отработал
}
else{
    header("Location: /index.php?page=prices&success=2");//если возникла ошибка
}