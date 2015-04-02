<?php
/**
 * Created by PhpStorm.
 * User: shatilov
 * Date: 01.04.15
 * Time: 18:29
 */
class Data_Menu extends Data_MySql{

	public static function getMainMenu()
	{
		return array(
			"Вход"          => "login",
			"Регистрация"   => "register",
            "Информация"         => "exit",

        );
	}
}