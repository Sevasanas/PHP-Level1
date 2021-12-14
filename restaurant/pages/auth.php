<?php
if(isset($_SESSION['id_user'])){
    echo "<h1>Пользователь авторизован</h1><br>"; 
    echo "<a href='index.php'>Перейти на главную</a>";
}
else{
if(isset($_GET['success_auth'])):?>
    <h1>Вы успешно авторизованы!</h1>
<?php endif;
if(isset($_GET['errors_reg'])){
    echo $_GET['errors_reg'];
} 
if(isset($_GET['unexist'])){
    echo "Пользователь не существует! Попробуйте снова";
} 
?>

<h1>Войдите в систему</h1>

<form action="models/user.php" method="post">
    <p>Введите логин</p>
    <input type="text" name="login">

    <p>Ваш пароль</p>
    <input type="password" name="pass"><br><br>

    <input type="submit" name="auth" value="Войти">
</form>
<?php
}