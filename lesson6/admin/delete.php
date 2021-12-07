<?php
require_once "../models/functions.php";

if($_GET['id']){
    $id = $_GET['id'];
    productsDelete($link, $id);
    header("Location: ../admin/index.php");
}