<?php
include_once "../config/config.php";
if($_POST['submit']){
    $userName = trim(strip_tags($_POST['userName']));
    $email = trim(strip_tags($_POST['email']));
    $text = trim(strip_tags($_POST['text']));

    $t = "INSERT INTO comment (userName, email, text) VALUES ('%s', '%s', '%s')";

    $query = sprintf($t, mysqli_real_escape_string($link, $userName), mysqli_real_escape_string($link, $email), mysqli_real_escape_string($link, $text));

    $result = mysqli_query($link, $query);

    if(!$result){
        die(mysqli_error($link));
    }else{
        header("Location: ../public/reviews.php");
    }
}

function commentsAll($link){
    $query = "SELECT * FROM comment ORDER BY id DESC";
    $result = mysqli_query($link, $query);

    if(!$result) {
        die(mysqli_error($link));
    }

    $n = mysqli_num_rows($result);
    $comments = array();

    for($i = 0; $i < $n; $i++){
        $row = mysqli_fetch_assoc($result);
        $comments[] = $row;
    }
    return $comments;
}