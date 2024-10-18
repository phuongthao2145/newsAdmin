<?php
class Author extends Db
{
    public function getAllAuthor()
    {
        $sql = self::$connection->prepare("SELECT * FROM author");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}
