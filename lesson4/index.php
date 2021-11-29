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
    <header>
        <h1 class="title">Сериалы</h1>
    </header>
    <div class="gallery">
    <?php
    $files = scandir("images");
    for($i=2; $i < count($files); $i++){?>
        <a href="fullImage.php?img=<?= $files[$i]?>">
        <img src="<?= PHOTOSMALL.$files[$i]?>" alt = "">
    </a>
    <?php 
    } 
    ?>
    </div>
    <?php
        require 'upload.php';
    ?>
    
</body>
</html>