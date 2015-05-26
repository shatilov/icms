<?php
/**
 * Created by PhpStorm.
 * User: Игорь
 * Date: 09.05.2015
 * Time: 10:40
 */

class Data_Comment extends Data_MySql
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

    public function get($id)
    {
        $sql = "SELECT * FROM `comments` WHERE book_id ='{$id}'";
        $result = $this->getDb()->query($sql);
        return $result;
    }

    public function add($tex,$b_id,$u_is)
    {
        $fields = array(
            'text' => $tex ,
            'date' => date("Y-m-d") ,
            'book_id'=> $b_id ,
            'user_id'=> $u_is ,
        );

        return $this->getDb()->simpleInsert('comments', $fields);
    }


}