<?php
    switch($_GET['page']){
         case 'auth':
            include "pages/auth.php";
            break;
            
         case 'add_good':
             include "admin/add_good.php";
             break;
        case 'edit_good':
            include "admin/edit_good.php";
            break;
         case 'prices':
            include "pages/prices.php";
            break;
       case 'reg':
            include "pages/reg.php";
            break;
       case 'details_order':
           include "admin/detail_order.php";
           break;
       case 'cart':
            include "public/cart.php";
            break;
       
            
       case 'edit_orders':
           include "admin/orders.php";
           break;
       case 'exit':
           unset($_SESSION['user_id']);
           session_destroy();
           $_SESSION = null;
          
            
            echo "Вы успешно вышли из системы<br>";
            echo "<a href='index.php'>Перейти на главную</a>";
            break;
        default:
            include "pages/prices.php";
    }