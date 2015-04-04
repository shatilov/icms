<?php
/**
 * Created by PhpStorm.
 * User: i.suhoparov
 * Date: 29.01.15
 * Time: 11:21
 */
class Data_Users extends Data_MySql{

    public function add()
    {
        $sql = "insert into log(post_l) values ('2')";
        return $this->getDb()->query($sql);
    }

	public function creteUser($login, $password, $secondname, $email, $name,$sex)
    {
        $date=date("Y-m-d H:i:s");

        $sql = "insert into users(login,password,email,name,secondname,registration,sex) values ('{$login}','".md5($password)."','{$email}','{$name}','{$secondname}','{$date}'";

        if($sex == "Mужчина")
        {
            $sql=$sql.",'1')";
        }
        else
        {
            $sql=$sql.",'0')";
        }
        return $this->getDb()->query($sql);

    }
    public function search($login)
    {

        $sql= "SELECT * FROM `users` WHERE login LIKE  '{$login}'";
        if($login=="")
            $sql= "SELECT * FROM  `users`";

        $result = $this->getDb()->query($sql);
        return $result->rowCount();
    }

    public function login($login,$password)
    {
        $password = md5($password);
        $sql= "SELECT * FROM `users` WHERE (login LIKE  '{$login}'  or email LIKE  '{$login}') and password LIKE '{$password}' ";

        $result = $this->getDb()->query($sql);
        if( $result->rowCount() == 1)
            return true;
        else
            return false;
    }


    public function getUser()
    {

    }
}