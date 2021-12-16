<?php
$baseMenu = ["Главная" => "/"];
$menuForNotAuthUser = ["Регистрация" => "?page=reg", "Войти" => "?page=auth"];
$menuForAuthUser = ["Личный кабинет" => "?page=cabinet", "Выйти" => "?page=exit", "Корзина" => "?page=cart"];

if(isset($_SESSION['id_user'])){//значит авторизован
    $menu = array_merge($baseMenu,$menuForAuthUser);
}
else{
    $menu = array_merge($baseMenu,$menuForNotAuthUser);
}

$list .= "<button class='button button-primary button-auth'>";
foreach($menu as $name => $link){
	 $list .= "<li class='button-text'><a href='$link'>$name</li>";
}
$list .= "</button>";


?>
<a href="index.php" class="logo">
    <img src="img/icon/logo.svg" alt="Logo"/>
</a>
<label class="address">
	<input type="text" class="input input-address" placeholder="Адрес доставки" />
</label>
<div class="buttons">
    <span class="user-name"></span>
	<?= $list?>
</div>