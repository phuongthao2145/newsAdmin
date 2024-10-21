<?php
class Item extends Db
{
    public function getAllItems()
    {
        $sql = self::$connection->prepare("SELECT *,`items`.id,`categories`.`name` as cate_name,`author`.`name` as author_name FROM items,categories,author
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
    public function updateItem($title,$excerpt,$content,$image,$catagory,$feature,$author,$date,$id){
        if($image != ""){
            $sql = self::$connection->prepare("UPDATE `items` 
            SET `title`=?, `excerpt`=?, `content`=?, `image`=?, `category`=?, `featured`=?, `author`=?,`updated_at`=? 
            WHERE `id` = ?");
            $sql->bind_param("ssssiiisi", $title,$excerpt,$content,$image,$catagory,$feature,$author,$date,$id);
        }
        else{
            $sql = self::$connection->prepare("UPDATE `items` 
            SET `title`=?, `excerpt`=?, `content`=?,  `category`=?, `featured`=?, `author`=?,`updated_at`=?
            WHERE `id` = ?");
            $sql->bind_param("sssiiisi", $title,$excerpt,$content,$catagory,$feature,$author,$date,$id);
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
