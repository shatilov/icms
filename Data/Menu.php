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
		$menu = array();
		if($user)
		{
			$user_name = $user->getLogin();
			$menu =  array_merge($menu , array(
				"Выход ({$user_name})"    => "exit" ,
			));
		}
		else
		{
			$menu =  array_merge($menu ,  array(
				"Вход"          => "login",
				"Регистрация"   => "register",
			));
		}

		return $menu;
	}

	public static function getMainMenu()
	{
		$user = Data_CurrentUser::get();
		$menu = array();
		if($user)
		{
			if($user->isAdmin())
			{
				$menu =  array_merge($menu ,  array(
					"Управление"          => "admin",
				));
			}
            $menu =  array_merge($menu ,  array(
                "Профиль"          => "profile",
            ));

		}

		return $menu;
	}
}