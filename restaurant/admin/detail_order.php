<?php
include '../models/functions.php';
if(isset($_GET['details'])){
   $goods = detailOrder($link,$_GET['id_user']);
}
?>
<h1>Детали заказа</h1>
<table>
<tr>
	<th>Название товара</th>
	<th>Стоимость товара</th>
	<th>Количество</th>
</tr>
<?php
foreach ($goods as $good) {?>
   <tr>
   		<td><?= $good['name']?></td>
   		<td><?= $good['sum']?></td>
   		<td><?= $good['count']?></td>
   </tr> 
<?php 
}
?>
</table>
<a href="<?= $_SERVER['HTTP_REFERER']?>">Вернуться к заказам</a>