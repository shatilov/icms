<?php
/**
 * Created by PhpStorm.
 * User: shatilov
 * Date: 06.04.15
 * Time: 11:25
 */
class Data_CurrentUser
{
	protected static $user_data = array();

	public static function get()
	{
		if(count(self::$user_data) == 0)
		{
			$sql_db = new Data_MySql();
			// попытаемся получить юзера по session_id
			$session_id = session_id();
			$sql = "select user_id from sessions where session_id = '{$session_id}'";
			$user_id = $sql_db->getDb()->query($sql)->fetchColumn();

			if($user_id)
			{
				$sql = "select * from users where user_id = '{$user_id}'";
				self::$user_data = $sql_db->getDb()->query($sql)->fetch(PDO::FETCH_ASSOC);
			}
		}
		return count(self::$user_data) ? self::$user_data : false;
	}



	public static function set($data)
	{
		self::$user_data = $data;
	}
}
