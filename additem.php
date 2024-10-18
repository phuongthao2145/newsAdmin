<?php
require "config.php";
require "models/db.php";
require "models/item.php";
$item = new Item;
$title = $_POST['title'];
$excerpt = $_POST['excerpt'];
$content = $_POST['content'];
$image = $_FILES["image"]["name"];
$catagory = $_POST['category'];
$feature = $_POST['featured'];
$author = $_POST['author'];
$created_at =  $_POST['date'];

//upload file
$target_dir = "../news/img/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
    $item->createItem($title,$excerpt,$content,$image,$catagory,$feature,$author,$created_at);
    header('location:items.php');
  } else {
    echo "Sorry, there was an error uploading your file.";
}