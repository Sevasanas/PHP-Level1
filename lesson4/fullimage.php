<?php
require_once 'blocks/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <a class="link" href="index.php"> Вернуться в галерею</a>
    <div class="photo">
        <img src="<?= PHOTO.$_GET['img']?>"alt = "">
    </div>

</body>
</html>