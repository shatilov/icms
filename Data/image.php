<?php
/**
 * Created by PhpStorm.
 * User: Игорь
 * Date: 09.05.2015
 * Time: 10:40
 */

class Data_image extends Data_MySql
{

    public function add($name,$date)
    {
        $sql = "INSERT INTO images (`name`, `date`)
        VALUES ('{$name}','{$date}')";
        return $this->getDb()->query($sql);
    }
    public function get_id($name)
    {
       $sql= "SELECT img_id
                FROM  `images`
                WHERE name =  '{$name}'";
        $r= $this->getDb()->query($sql)->fetch();
        return $r['img_id'];
    }
    public function get_url($id)
    {
        $sql= "SELECT name
                FROM  `images`
                WHERE img_id =  '{$id}'";
        $r= $this->getDb()->query($sql)->fetch();
        return $r['name'];
    }

}