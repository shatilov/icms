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
        $fields = array(
            'name' => $name ,
            'date'=> $date
        );

        return $this->getDb()->simpleInsert('images', $fields);
    }

    public function get_url($id)
    {
        $sql= "SELECT name
                FROM  `images`
                WHERE img_id =  '{$id}'";
        $r= $this->getDb()->query($sql)->fetch();
        return $r['name'];
    }
    public function  get_avatar($id)
    {
        $sql= "SELECT url
                FROM  `avatar`
                WHERE `avatar_id` =  '{$id}'";
        $r= $this->getDb()->query($sql)->fetch();
        return $r['url'];
    }

}