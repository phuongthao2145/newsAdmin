<?php
require "config.php";
require "models/db.php";
require "models/item.php";
$item = new Item;
$title = $_POST['title'];
$excerpt = $_POST['excerpt'];
$content = $_POST['content'];
$image = isset($_FILES["image"]["name"]) ? $_FILES["image"]["name"] : "";
$catagory = $_POST['category'];
$feature = $_POST['featured'];
$author = $_POST['author'];
$date = date("Y-m-d");
$id = $_POST['id'];
var_dump($content);
//upload file
if ($_FILES["image"]["name"]!="") {
  $target_dir = "../news/img/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);

  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
    header('location:items.php');
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
$item->updateItem($title,$excerpt,$content,$image,$catagory,$feature,$author,$date,$id);