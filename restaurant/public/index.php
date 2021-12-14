
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
				include "../pages/prices.php";
				include "../templates/content.php";
				?>
		</div>
		<!-- /.container -->
	</main>

	<footer class="footer">
		<?=include "../templates/footer.php"?>
	</footer>

	
</body>

</html>