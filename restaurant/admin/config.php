<?php
const SERVER = "localhost";
const LOGIN = "root";
const PASS = "";
const DB = "restaurant";

const PHOTO = 'img/big/';
const PHOTOSMALL = 'img/small/';

$link = mysqli_connect(SERVER,LOGIN,PASS,DB) or die("Error: ".mysqli_error($link));

if(!mysqli_set_charset($link, "utf8")){
    printf("Error: ".mysqli_error($link));
}