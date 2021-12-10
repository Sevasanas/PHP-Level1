<?php
require_once "../models/functions.php";
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
<a href="index.php" class="logo">
    <img src="img/icon/logo.svg" alt="Logo" />
</a>
<div class="buttons">
	<button class="button button-primary button-auth">
		<span class="button-text"><a href="add.php">Добавить товар</a></span>
	</button>
</div>
<div class="section-heading">
	<h2 class="section-title restaurant-title">Админ</h2>
</div>
<div class="cards cards-menu">
	<?php
	require_once "../models/functions.php";
	require_once "config.php";
	$products = productsAll($link);
	if($products){
		foreach($products as $product):?>
			<div class="card">
				<img src="<?=PHOTOSMALL.$product['img']?>" alt="">
				<div class="card-text">
				    <div class="card-heading">
						<h3 class="card-title card-title-reg"><?=$product['name']?></h3>
					</div>
					<!-- /.card-heading -->
                    <div class="card-info">
                        <div class="ingredients"><?=$product['description']?></div>
                    </div>
                    <!-- /.card-info -->
                    <div class="card-buttons">
                        <button class="button button-primary button-add-cart">
                            <span class="button-card-text"><a href="edit.php?id=<?=$product['id']?>">Редактировать</a></span>
                            <span class="button-card-text"><a href="delete.php?id=<?=$product['id']?>">Удалить</a></span>
                        </button>
                    </div>
			    </div>
						<!-- /.card-text -->
			</div>
					<!-- /.card -->
		<?php endforeach;
	}?>

				</div>
				<!-- /.cards -->
</body>
</html>