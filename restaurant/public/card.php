<?php
if($_GET['id']){
	$id = (int)($_GET['id']);
}
include_once "../models/functions.php";
include_once "../config/config.php";
$data = getGoods($link, $id);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>PizzaBurger — доставка еды на дом</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap&subset=cyrillic" rel="stylesheet" />
	<link rel="stylesheet" href="css/normalize.css" />
	<link rel="stylesheet" href="css/style.css" />
</head>

<body>
	<div class="container">
		<header class="header">
			<?php
				include "../templates/header.php";
			?>
		</header>
	</div>
	<!-- /.container  -->
    <main class="main">
		<div class="container">
			<section class="menu">
				<div class="section-heading">
					<h2 class="section-title restaurant-title"><?= $data['name']?></h2>
				</div>
                <img src="<?= PHOTO.$data['img']?>" alt="" class="card-image" />
                <div class="cards cards-menu">
						<div class="card-text">
							<div class="card-info">
								<div class="ingredients"><?= $data['description']?></div>
							</div>
							<!-- /.card-info -->
							<div class="card-buttons">
								<button class="button button-primary button-add-cart">
								<?php
								if(isset($_SESSION['id_user'])):?>
								<span class="button-card-text"><a href="models/goods.php?id=<?=$data['id']?>">В корзину</a></span>
								<?php endif;?>
									<span class="button-cart-svg"></span>
								</button>
								<strong class="card-price-bold"><?= $data['price']?></strong>
							</div>
						</div>
						<!-- /.card-text -->

                    </div>
				<!-- /.cards -->
			</section>
		</div>
		<!-- /.container -->
	</main>
    <footer class="footer">
		<?=include "../templates/footer.php"?>
	</footer>
</body>
</html>