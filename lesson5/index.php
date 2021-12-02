
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Serials</title>
</head>
<body>
    <header>
        <h1 class="title">Сериалы</h1>
    </header>
    <div class="gallery">
        <?php
        include_once "config.php";

        $sql = "SELECT * FROM gallery ORDER BY count DESC";
        $table = mysqli_query($connect, $sql);
       
        while ($data = mysqli_fetch_assoc($table)) :?>
            <a href="fullImage.php?id=<?= $data['id']?>">
                <img src="<?= PHOTOSMALL.$data['filename']?>" alt = "">
            </a>
        <?php endwhile;?>
    </div>
    
</body>
</html>