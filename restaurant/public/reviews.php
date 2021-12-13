<?php
include_once "../models/base.php";
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
                    <h2 class="section-title restaurant-title">Отзывы</h2>
                </div>
                <?php
                $comments = commentsAll($link);
                if($comments){
                    foreach($comments as $comment):?>
                        <div class="comment">
                            <p>ФИО:<?= $comment['userName']?></p>
                            <p>Email:<?= $comment['email']?></p>
                            <p>Текст:<?= $comment['text']?></p>
                        </div>
                    <?php endforeach; 
                }?>
                <form method="post" action="../models/base.php">
                    <p><strong>Оставить отзыв о сайте:</strong></p>
                    <p>Введите ФИО: <input type="text" name="userName" maxlength="30" required></p>
                    <p>Введите Email: <input type="email" name="email" maxlength="20" required></p>
                    <p>Введите Текст: <textarea name="text" rows="10" required></textarea></p>
                    <p><input type="submit" name="submit"></p>
                </form>
            </section>
        </div>
    </main>
    <footer class="footer">
		<?=include "../templates/footer.php"?>
	</footer>
</body>
</html>