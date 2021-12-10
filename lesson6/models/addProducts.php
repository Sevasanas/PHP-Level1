<?php

require_once "functions.php";
require_once "base.php";

if($_POST['submit']){
    $name = trim(strip_tags($_POST['name']));
    $description = trim(strip_tags($_POST['description']));
    $price = trim(strip_tags($_POST['price']));

   require_once "image.php";
   require_once "../admin/config.php";

   $filePath = $_FILES['img']['tmp_name'];
   $fileName  = translate($_FILES['img']['name']);
   $type = $_FILES['img']['type'];
   $size = $_FILES['img']['size'];
   if($type == 'image/jpeg' || $type == 'image/png' || $type == 'image/gif'){
    if($size>0 and $size<1000000){
        if(copy($filePath,PHOTO.$fileName)){
            image_resize(PHOTO.$fileName, PHOTOSMALL.$fileName, 250, 150);
            if(($_POST['edit'])){
                $id = (int)trim(strip_tags($_POST['edit']));
                productsEdit($link, $id, $name, $description, PHOTO.$fileName, PHOTOSMALL.$fileName, $price);
                header("Location: ../admin/index.php");
            }else{
                productsNew($link, $name, $description, PHOTO.$fileName, PHOTOSMALL.$fileName, $price);
                header("Location: ../admin/index.php");
            }

            $message = "<h3>Файл успешно загружен на сервер</h3>";
        }else{
            $message = "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>";
            exit;
        }
    }else{
        $message = "<b>Ошибка - картинка превышает 1 Мб.</b>";
    }
}else{
    $message = "<b>Картинка не подходит по типу! Картинка должна быть в формате JPEG, PNG или GIF</b>";
}
}