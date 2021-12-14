<?php
if(isset($_GET['success_reg'])){
    header("Location: index.php");
}
if(isset($_GET['errors_reg'])){
    echo $_GET['errors_reg'];
}   
?>
   <form action="models/user.php" method="POST">
    <p>Ваше имя</p>
    <input type="text" name="fio">
    
    <p>Ваш телефон</p>
    <input type="text" name="phone">
    
    <p>Введите логин</p>
    <input type="text" name="login">
    
    <p>Ваш пароль</p>
     <input type="password" name="pass">
     <p>Введите адрес доставки</p>
     <textarea name="address" cols="30" rows="10"></textarea><br><br>
     <input type="submit" name="reg" value="Зарегистрироваться">
</form>