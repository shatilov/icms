<?php
/**
 * Created by PhpStorm.
 * User: shatilov
 * Date: 29.01.15
 * Time: 11:21
 */
class Data_Users extends Data_MySql{

	public function creteUser($login,$password,$fullname)
    {
        $sql = "insert into users(login,password,fullname) values ('{$login}','{$password}','{$fullname}')";
        return $this->getDb()->query($sql);
    }

    public function getUser()
    {

    }
}