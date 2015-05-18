<?php
/**
 * Created by PhpStorm.
 * User: i.suhoparov
 * Date: 29.01.15
 * Time: 11:21
 */
class Data_Users extends Data_MySql{

    public function add($zn)
    {
        $sql = "insert into log(post_l) values ('{$zn}')";
        return $this->getdb()->query($sql);
    }

	public function createUser($login, $password, $secondname, $email, $name,$sex)
    {
        $date=date("Y-m-d H:i:s");
        $sql = "insert into users(login,password,email,name,secondname,registration,sex) values ('{$login}','".md5($password)."','{$email}','{$name}','{$secondname}','{$date}' , {$sex}";
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
	    {
		    $user_data = $result->fetch(PDO::FETCH_ASSOC);
			$this->createSession($user_data['user_id']);
		    return true;
	    }
        else return false;
    }

	protected  function createSession($user_id)
	{
		$session_id = session_id();
		$sql = "INSERT INTO sessions(user_id,session_id) values('{$user_id}' , '{$session_id}')";
		return $this->getDb()->query($sql);
	}

    public function getUser()
    {

    }
}