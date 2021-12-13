<?php
include_once "../models/functions.php";
include_once "config.php";
if($_GET['id']){
    $id = (int)($_GET['id']);
    $product = productsGet($link, $id);
}
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
        <form method="post" action="../models/addProducts.php" enctype="multipart/form-data">
            <p><strong>Добавить товар:</strong></p>
            <p>Наименование: <br><input type="text" name="name" maxlength="100" value="<?=$product['name']?>"></p>
            <p>Описание: <br><textarea name="description" rows="10"><?=$product['description']?></textarea></p>
            <p>Цена: <br><input type="number" name="price" maxlength="20" value="<?=$product['price']?>" ></p>
            <p><strong>Загрузите картинку в формате JPEG, PNG или GIF</strong></p>
            <p><img src="<?=PHOTOSMALL?>" width="200"></p>
            <p><input type="file" name="img" accept="image/jpeg,image/png,image/gif"></p>
            <input type="hidden" name="src" value="<?=$product['img']?>">
            <input type="hidden" name="edit" value="<?=$product['id']?>">
            <p><input type="submit" name="submit"></p>
        </form>
    </div>

</body>
</html>