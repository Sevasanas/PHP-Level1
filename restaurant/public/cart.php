<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script>
    function save(id){
       let count = document.getElementById("good_"+id).value;//получили актуальное количество товаров
       location.href = "/?page=cart&id_good="+id+"&count="+count;//после этой инструкции запускается инструкция на строке 28
    }
</script>
<?php
include_once "../config/config.php";
include_once "../models/functions.php";
if(isset($_GET['order'])){
    createOrder($link);
}

if(isset($_GET['finish'])):?>
    <h1>Заказ находится в обработке! Общая стоимость заказа <?=$_GET['finish']?>. Ожидайте звонка! Спасибо за Ваш заказ!</h1>
<?php
endif;
if(isset($_GET['count'])){
    updateCountInCart($link,$_GET['id_good'],$_GET['count']);
}
if(!isset($_SESSION['order'])):?>
<div class="modal modal-cart is-open">
		<div class="modal-dialog">
			<div class="modal-header">
				<h3 class="modal-title">Корзина</h3>
				<button class="close">&times;</button>
			</div>
			<!-- /.modal-header -->
            <?php
            else:?>
            <h3 class="modal-title">Ваш заказ</h3>
            <?php
            $sql = "SELECT id_good, name, price*count AS sum, count FROM pizza INNER JOIN cart ON cart.id_good = pizza.id AND id_user=".$_SESSION['id_user'];
            $increase = "UPDATE cart SET count = count + 1 WHERE id = id_good";
            $reduce = "UPDATE cart SET count = count - 1 WHERE id = id_good";
            $res = mysqli_query($link,$sql);
            while($data = mysqli_fetch_assoc($res)):?>
			<div class="modal-body">
				<div class="food-row">
					<span class="food-name"><?= $data['name']?></span>
					<strong class="food-price"><?= $data['price']?></strong>
                    <div class="food-counter">
						<button class="counter-button">-<?= $reduce?></button>
						<span class="counter"><?= $data['count']?></span>
						<button class="counter-button">+<?= $increase?></button>
					</div>
				</div>
				<!-- /.foods-row -->
				
			<!-- /.modal-body -->
			<div class="modal-footer">
				<span class="modal-pricetag"><?= $data['sum']?></span>
                <?php
                if(empty($_SESSION['order'])):?>
				<div class="footer-buttons">
					<a class="button button-primary" href="/?page=cart&order=true"><button>Оформить заказ</button></a>
					<button class="button clear-cart">Отмена</button>
				</div>
                <?php endif;?>
			</div>
			<!-- /.modal-footer -->
		</div>
		<!-- /.modal-dialog -->
	</div>
</body>
</html>