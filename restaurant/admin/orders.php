<script>
	function changeStatus(id,id_user){//id - это id статуса заказа
		location.href="/?page=edit_orders&id_order="+id+"&id_user="+id_user;
	}
</script>
<?php 

include '../models/functions.php';
if(isset($_GET['id_order'])){
    updateOrder($link,$_GET['id_order'],$_GET['id_user']);
}
/*
if(isset($_GET['details'])){
    header("Location: pages/admin/detail.php");
    detailOrder($connect,$_GET['id_user']));
}
*/
?>
<h1>Управление заказами</h1>
<table>
<tr>
	<th>№ заказа</th>
	<th>ФИО заказчика</th>
	<th>Телефон</th>
	<th>Адрес доставки</th>
	<th>Статус заказа</th>
	<th>Общая сумма заказа</th>
	<th>Подробная информация</th>
</tr>
<?php 
    $orders = getAllOrders($link);
    foreach ($orders as $key => $order){//$key - индекс массива, начиная с 0,$order - значение каждого элемента массива
        $user = getInfoUser($link,$order['id_user']);//получили массив со всеми свойствами юзера
    ?>
       <tr>
       		<td><?= $key + 1?></td>
       		<td><?=$user['name']?></td>
       		<td><?=$user['phone']?></td>
       		<td><?= $user['address']?></td>
       		<td><select onchange="changeStatus(value,<?= $order['id_user']?>)"><?= getTextStatusOrder($link,$order['status_order'])?></select></td>
       		<td><?= $order['TotalSum']?></td>
       		<td><a href="?page=detail_order&details=true&id_user=<?= $order['id_user']?>"><button>Детали заказа</button></a></td>
       </tr> 
    <?php }
    
    //print_r($orders);
?>
</table>