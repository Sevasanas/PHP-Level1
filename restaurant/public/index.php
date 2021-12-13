
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
				<?php
				include "../templates/menu.php";
				?>
				<div class="cards cards-menu">
				<?php
				require_once "../models/functions.php";
				require_once "../config/config.php";
				$products = productsAll($link);
				if($products){
					foreach($products as $product):?>
					<div class="card">
						<a href="card.php?id=<?=$product['id']?>"class="card-image"><img src="<?=PHOTOSMALL.$product['img']?>" alt=""></a>  
						<div class="card-text">
							<div class="card-heading">
								<h3 class="card-title card-title-reg"><a href="card.php?id=<?=$product['id']?>"><?=$product['name']?></a></h3>
							</div>
							<!-- /.card-heading -->
							<div class="card-info">
								<div class="ingredients"><?=$product['description']?></div>
							</div>
							<!-- /.card-info -->
							<div class="card-buttons">
								<button class="button button-primary button-add-cart">
									<span class="button-card-text"><a href="#">В корзину</a></span>
									<span class="button-cart-svg"></span>
								</button>
								<strong class="card-price-bold"><?=$product['price']?></strong>
							</div>
						</div>
						<!-- /.card-text -->
					</div>
					<!-- /.card -->
					<?php endforeach;
				}?>

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