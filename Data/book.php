<?php
/**
 * Created by PhpStorm.
 * User: Игорь
 * Date: 09.05.2015
 * Time: 10:40
 */

class Data_book extends Data_MySql
{

    public function search($id)
    {
        $sql = "SELECT * FROM `books` WHERE book_id LIKE  '{$id}'";
        $result = $this->getDb()->query($sql)->fetch();
        if ($result)
            return $result;
        else
            return 0;
    }

    public function get()
    {
        $sql = "SELECT * FROM `books`";
        $result = $this->getDb()->query($sql);
        return $result;
    }

    public function add($name,$author,$ganre,$year,$img_id)
    {
        $fields = array(
            'name' => $name ,
            'author'=> $author ,
            'ganre'=> $ganre ,
            'year'=> $year ,
            'img_id'=> $img_id
        );

        return $this->getDb()->simpleInsert('books', $fields);
    }


}