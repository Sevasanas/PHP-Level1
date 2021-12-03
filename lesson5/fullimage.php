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
    <?php
    include_once "config.php";

    $idImage = $_GET['id'];
    $sqlImg = "SELECT * FROM gallery WHERE id = '$idImage'";

    if (mysqli_query($connect, $sqlImg)) {
        $image = mysqli_fetch_assoc(mysqli_query($connect, $sqlImg));
        $update = "UPDATE gallery SET count = count + 1 WHERE id = $idImage";
        $title = mysqli_fetch_assoc(mysqli_query($connect, $sqlImg));
        $text = mysqli_fetch_assoc(mysqli_query($connect, $sqlImg));
        mysqli_query($connect, $update);
    }
    ?>
    <a class="link" href="index.php"> Вернуться в галерею</a>
    <div class="photo">
        <h2 class="photo_title"><?= $title['title'] ?></h2>
        <img src="<?= PHOTO.$image['filename']?>"alt = "image<?= $idImage ?>">
        <p class="photo_text"><?= $text['description'] ?></p>
        <p class="photo_count">Количество просмотров: <?= ++$image['count'] ?></p>
    </div>

</body>
</html>