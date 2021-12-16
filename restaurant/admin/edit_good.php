<?php
include_once "../models/functions.php";
include_once "config.php";
if($_GET['success'] == 1):?>
    <h1 style="color: red;">Товар успешно обновлен!</h1>
<?php endif;?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>PizzaBurger —  Админ</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap&subset=cyrillic" rel="stylesheet" />
	<link rel="stylesheet" href="css/normalize.css" />
	<link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <a href="index.php" class="logo">
        <img src="img/icon/logo.svg" alt="Logo" />
    </a>
    <div class="buttons">
        <button class="button button-primary button-auth">
            <span class="button-text"><a href="add.php">Добавить товар</a></span>
        </button>
    </div>
    <div class="cards cards-menu">
        <?php
        if($_GET['action'] != "edit") {
            $goods = getGoods($link);//получаем массив всех товаров
        }
        else{
            $good = getGoods($link,$_GET['id']);//получаем массив из 1 товара?>
        
            <form method="post" action="models/edit_goods.php" enctype="multipart/form-data">
                <input name="id" type="hidden" value="<?= $_GET['id']?>">
                <p>Название товара</p>
                <input name="name" type="text" value="<?= $good['name']?>">
                <p>Стоимость товара</p>
                <input name="price" type="text" value="<?= $good['price']?>">
                <p>Информация о товаре</p>
                <textarea name="description" cols="30" rows="10" value="<?= $good['description']?>"><?= $good['description']?></textarea>
                <p>Изображение товара</p>
                <img name="img" width="100" src="img/big/?= $good['img']?>" alt="">
                <input type="file" accept="image/*" name="photo"><br><br>
                <input type="submit" value="Сохранить">
            </form>
        
            <?php
        }
        
        
        if($_GET['action'] == 'delete'){
            if(deleteGood($link,(int)$_GET['id']) == 1):?>
                <h1 style="color:red;">Товар удален</h1>
           <?php endif;
        }
        
        if($_GET['action'] != "edit") :
        ?>
        
        <h1>Редактирование товаров</h1>
        
        <table >
            <tr>
                <th>Название товара</th>
                <th>Действие</th>
            </tr>
            <?php
            if(!empty($goods)){
            foreach ($goods as $id => $name){?>
                <tr>
                    <td><?= $name?></td>
                    <td>
                        <a href="/?page=edit_good&action=delete&id=<?= $id?>"><button>Удалить товар</button></a>
                        <a href="/?page=edit_good&action=edit&id=<?= $id?>"><button>Редактировать товар</button></a>
                    </td>
                </tr>
            <?php
            }
            }
            else{?>
                <h1>Товары отсутствуют!</h1>
            <?php
            }
            ?>
        
        </table>
        <?php
        endif;
        ?>
    </div>

</body>
</html>