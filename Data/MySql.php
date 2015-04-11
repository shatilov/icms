<?php
/**
 * Created by PhpStorm.
 * User: i.suhoparov
 * Date: 29.01.15
 * Time: 11:28
 */
class Data_MySql
{
	protected $database;

	function __construct()
	{
		$this->database = new medoo(array(
			// required
			'database_type' => 'mysql',
			'database_name' => 'maesz_icms',
			'server'        => 'localhost',
			'username'      => '045204178_icms',
			'password'      => 'icms123',
			// optional
			'port'          => 3306,
			'charset'       => 'utf8',
			// driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
			'option'        => array(
				PDO::ATTR_CASE => PDO::CASE_NATURAL
			)
		));
	}

	public function getDb()
	{
		return $this->database;
	}

	protected function setDb($database)
	{
		$this->database = $database;
	}
}