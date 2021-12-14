<?php
include_once "../models/functions.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>PizzaBurger —  Админ</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap&subset=cyrillic" rel="stylesheet" />
	<link rel="stylesheet" href="css/normalize.css" />
	<link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <a href="index.php" class="logo">
        <img src="img/icon/logo.svg" alt="Logo" />
    </a>
    <div class="buttons">
        <button class="button button-primary button-auth">
            <span class="button-text"><a href="add.php">Добавить товар</a></span>
        </button>
    </div>
    <div class="cards cards-menu">
        <?php 
        if($_GET['success'] == 1){?>
            <h1 style="color: red;">Товар успешно добавлен!</h1>
        <?php }
        ?>
        <h1>Добавление нового товара</h1>

        <form action="engine/admin_goods.php" method="post" enctype="multipart/form-data">
            <p>Название товара</p>
            <input type="text" name="title">
            <p>Стоимость товара</p>
            <input type="text" name="price">
            <p>Информация о товаре</p>
            <textarea name="info" rows="10" cols="30"></textarea>
            <p>Загрузить фото</p>
            <input type="file" name="photo" accept="image/*"><br></br>
            <input type="submit" value="Сохранить"> 	
        </form>
    </div>
</body>
</html>