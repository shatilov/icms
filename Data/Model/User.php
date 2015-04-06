<?php
/**
 * Created by PhpStorm.
 * User: shatilov
 * Date: 06.04.15
 * Time: 14:40
 */
class Data_Model_User
{
	protected $_user_id;
	protected $_roles;
	protected $_login;
	protected $_secondname;
	protected $_name;
	protected $_sex;
	protected $_email;
	protected $_registration;

	protected $_data;

	const ADMIN_ROLE = 'admin';

	public function __construct($data = false)
	{
		if($data)
		{
			$this->setFromArray($data);
		}
	}

	public function toArray()
	{
		return $this->_data;
	}

	public function setFromArray($data)
	{
		$this->_data = $data;
		if(isset($data['user_id']))
		{
			$this->_user_id = $data['user_id'];
		}

		if(isset($data['roles']))
		{
			$this->_roles = explode( ',' , $data['roles']);
		}

		if(isset($data['login']))
		{
			$this->_login = $data['login'];
		}

		if(isset($data['secondname']))
		{
			$this->_secondname = $data['secondname'];
		}

		if(isset($data['name']))
		{
			$this->_name = $data['name'];
		}

		if(isset($data['sex']))
		{
			$this->_sex = $data['sex'];
		}

		if(isset($data['email']))
		{
			$this->_email = $data['email'];
		}

		if(isset($data['registration']))
		{
			$this->_registration = $data['registration'];
		}
	}

	public function getLogin()
	{
		return $this->_login;
	}

	public function isAdmin()
	{
		return in_array(self::ADMIN_ROLE , $this->_roles);
	}

}
