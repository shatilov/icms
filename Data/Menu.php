<?php
/**
 * Created by PhpStorm.
 * User: shatilov
 * Date: 01.04.15
 * Time: 18:29
 */
class Data_Menu extends Data_MySql{

	public static function getRightMenu()
	{
		$user = Data_CurrentUser::get();
		$user_name = $user['login'];
		if(Data_CurrentUser::get())
		{
			return array(
				"Выход ({$user_name})"    => "exit" ,
			);
		}
		else
		{
			return array(
				"Вход"          => "login",
				"Регистрация"   => "register",
			);
		}
	}

	public static function getMainMenu()
	{
		return array();
	}
}