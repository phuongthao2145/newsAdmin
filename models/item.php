<?php
class Item extends Db
{
    public function getAllItems()
    {
        $sql = self::$connection->prepare("SELECT *,`categories`.`name` as cate_name,`author`.`name` as author_name FROM items,categories,author
        WHERE items.category = categories.id
        AND items.author = author.id 
        ORDER BY items.id DESC");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function createItem($title,$excerpt,$content,$image,$catagory,$feature,$author,$created_at){
        $sql = self::$connection->prepare("INSERT INTO `items`(`title`, `excerpt`, `content`, `image`, `category`, `featured`, `author`,`created_at`) 
        VALUES (?,?,?,?,?,?,?,?)");
        $sql->bind_param("ssssiiis", $title,$excerpt,$content,$image,$catagory,$feature,$author,$created_at);
        var_dump($sql);
        return $sql->execute();
    }
    public function updateItem($title,$excerpt,$content,$image,$catagory,$feature,$author){
        if($image != ""){
            $sql = self::$connection->prepare("INSERT INTO `items`(`title`, `excerpt`, `content`, `image`, `category`, `featured`, `author`) 
            VALUES (?,?,?,?,?,?,?)");
            $sql->bind_param("ssssiii", $title,$excerpt,$content,$image,$catagory,$feature,$author);
        }
        else{
            $sql = self::$connection->prepare("INSERT INTO `items`(`title`, `excerpt`, `content`, `category`, `featured`, `author`) 
            VALUES (?,?,?,?,?,?)");
            $sql->bind_param("sssiii", $title,$excerpt,$content,$catagory,$feature,$author);
        }
       
        return $sql->execute();
    }
    public function getItemById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM items WHERE id = ?");
        $sql->bind_param("i", $id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}
