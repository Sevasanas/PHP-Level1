<?php
include "../config/config.php";



$sql = "SELECT * FROM pizza";

$res = mysqli_query($link,$sql);//запустили запрос sql на сервере

if(!isset($_SESSION['id_user'])):?>
<p>Товары можно приобрести только авторизованным пользователям</p>
<?php
endif;


if(isset($_GET['success'])){
    if($_GET['success'] == 1){?>
    <script>alert("Товар добавлен в корзину")</script>;
   <?php
    } else{?>
        <script>alert("Ошибка при добавлении товара")</script>;
    <?php
    }
}
?>


<div class="cards cards-menu">
    <?php
        require_once "../models/functions.php";
        require_once "../config/config.php";
        while($data = mysqli_fetch_assoc($res)):?>
            <div class="card">
                <a href="card.php?id=<?=$data['id']?>"class="card-image"><img src="<?=PHOTOSMALL.$data['img']?>" alt=""></a>  
                <div class="card-text">
                    <div class="card-heading">
                        <h3 class="card-title card-title-reg"><a href="card.php?id=<?=$data['id']?>"><?=$data['name']?></a></h3>
                    </div>
                    <!-- /.card-heading -->
                    <div class="card-info">
                        <div class="ingredients"><?=$data['description']?></div>
                    </div>
                    <!-- /.card-info -->
                    <div class="card-buttons">
                        <button class="button button-primary button-add-cart">
                            <?php
                            if(isset($_SESSION['id_user'])):?>
                            <span class="button-card-text"><a href="models/goods.php?id=<?=$data['id']?>">В корзину</a></span>
                            <?php endif;?>
                            <span class="button-cart-svg"></span>
                        </button>
                        <strong class="card-price-bold"><?=$data['price']?></strong>
                    </div>
                </div>
                <!-- /.card-text -->
            </div>
            <!-- /.card -->
            <?php endwhile;
        ?>

        </div>
        <!-- /.cards -->
    </section>
  

</div>
