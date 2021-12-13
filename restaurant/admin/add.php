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
        <form method="post" action="../models/addProducts.php" enctype="multipart/form-data">
            <p><strong>Добавить товар:</strong></p>
            <p>Введите наименование: <br><input type="text" name="name" maxlength="100" required></p>
            <p>Введите описание: <br><textarea name="description" rows="10" required></textarea></p>
            <p>Введите цену: <br><input type="number" name="price" maxlength="20" required></p>
            <p><strong>Загрузите картинку в формате JPEG, PNG или GIF</strong></p>
            <p><input type="file" name="img" accept="image/jpeg,image/png,image/gif" required></p>
            <p><input type="submit" name="submit"></p>
        </form>
    </div>
</body>
</html>