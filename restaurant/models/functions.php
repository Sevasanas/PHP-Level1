<?php
require_once "../config/config.php";

function updateCountInCart($link, $id_good, $count){
    $sql = "UPDATE cart SET count = $count WHERE id_pizza = $id_good and id_user =".$_SESSION['id_user'];

    $res = mysqli_query($link, $sql);
    if(mysqli_affected_rows($link)>0):?>
        <script>alert('Сохранено!')</script>;    
    <?php endif;
}

function createOrder($link){
    $sql = "UPDATE cart SET status = 1 WHERE status = 0 and id_user=".$_SESSION['id_user'];
    $res = mysqli_query($link,$sql);
     $check = true;
     if($res){
        $getTotal = "SELECT SUM(pizza.price * cart.count) AS 'total' FROM pizza INNER JOIN cart ON cart.id_good = pizza.id WHERE id_user=".$_SESSION['id_user']; 
        $r = mysqli_query($link, $getTotal);
        $total = mysqli_fetch_assoc($r)['total']; 
         
         
         $createOrder = "INSERT INTO orders(id_user,status_order,TotalSum) VALUES(".$_SESSION['id_user'].",2,$total)";
         $r = mysqli_query($link,$createOrder);
         if(mysqli_affected_rows($link)>0){
             $_SESSION['order'] = "finish";?>
                <script>location.href = '/?page=cart&finish=$total'</script>;
             <?php
         }
         else{
             $check = false;
         }
     }
     else{
         $check = false;
     }
     
     if(!$check){?>
        <script>alert('Возникла ошибка при заказе!')</script>;
         <?php
     }
}

function getInfoUser($link,$id_user){//по ID получаем всю информацию о юзере в виде ассоц. массива
    $sql = "SELECT * FROM users WHERE id_user=$id_user";
    $res = mysqli_query($link,$sql);
    $data = mysqli_fetch_assoc($res);//data - массив со всеми свойствами юзера
    return $data; 
}

function getTextStatusOrder($link,$id_status){//по ID получим текст статуса заказа
    $sql = "SELECT * FROM orderstatus";
    $res = mysqli_query($link,$sql);
    $option = "";
    while($statuses = mysqli_fetch_assoc($res)){ 
        if($statuses['id'] == $id_status){
            $option .= "<option style='color:red;' value={$statuses['id']} selected>{$statuses['status']}</option>";
        }
        else{
            $option .= "<option value={$statuses['id']}>{$statuses['status']}</option>";
        }
    }
    return $option;
}

function getAllOrders($link){
    $sql = "SELECT * FROM orders";
    $res = mysqli_query($link,$sql);
    
    while($order = mysqli_fetch_assoc($res)){
        $orders[] = $order;//добавление элементов в массив
    }
    return $orders;
}

function updateOrder($link,$id_order,$id_user){
    $sql = "UPDATE orders SET status_order=$id_order WHERE id_user=$id_user";
    
    $res = mysqli_query($link,$sql);
    
}

function detailOrder($link,$id_user){
    $sql = "SELECT id_pizza, name, price*count AS sum,count FROM pizza INNER JOIN cart ON cart.id_good = goods.id WHERE id_user=$id_user";
    $res = mysqli_query($link,$sql);
    while($good = mysqli_fetch_assoc($res)){
        $goods[] = $good;//добавление элементов в массив
    }
    return $goods;
}

function productsAll($link){
    $query = "SELECT * FROM pizza ORDER BY id DESC";
    $result = mysqli_query($link, $query);

    if(!$result) {
        die(mysqli_error($link));
    }

    $products = [];

    while($data = mysqli_fetch_assoc($result)){
        $products[] = $data;
    }
    return $products;
}

function productsNew($link, $name, $description, $price, $img){
    $t = "INSERT INTO pizza (name, description, price, img) VALUES ('%s', '%s', '%s', '%s')";

    $query = sprintf($t, mysqli_real_escape_string($link, $name),mysqli_real_escape_string($link, $description),mysqli_real_escape_string($link, $price),mysqli_real_escape_string($link, $img));

    $result = mysqli_query($link, $query);

    if(!$result) {
        die(mysqli_error($link));
    }

    return true;
}
function productsGet($link, $id){
    $query = sprintf("SELECT * FROM pizza WHERE id=%d", (int)$id);
    $result = mysqli_query($link, $query);

    if(!$result) {
        die(mysqli_error($link));
    }

    $product = mysqli_fetch_assoc($result);

    return $product;
}

function productsDelete($link, $id){
    $id = (int)$id;

    if($id == 0) {
        return false;
    }

    $query = sprintf("DELETE FROM pizza WHERE id='%d'", $id);
    $result = mysqli_query($link, $query);

    if(!$result) {
        die(mysqli_error($link));
    }
    return mysqli_affected_rows($link);
}

function productsEdit($link, $id, $name, $description, $price, $img){
    $id = (int)$id;

    $sql = "UPDATE pizza SET name='%s', description='%s', price='%s', img='%s' WHERE id='%d'";

    $query = sprintf($sql, mysqli_real_escape_string($link, $name), mysqli_real_escape_string($link, $description), mysqli_real_escape_string($link, $price), mysqli_real_escape_string($link, $img),$id);

    $result = mysqli_query($link, $query);

    if(!$result) {
        die(mysqli_error($link));
    }
    return mysqli_affected_rows($link);
}

