<?php
/**
 * Created by PhpStorm.
 * User: shatilov
 * Date: 01.04.15
 * Time: 18:32
 */
class Helper_Menu
{
	/**
	 * рисуем одноуровневое меню
	 */
	public static function displayMain()
	{
		$menu = Data_Menu::getMainMenu();
		$links = array();
		foreach($menu as $title=>$link)
		{
			$active = $_GET['go'] == $link ? 'class="active"' : '';
			$links[] = '<li '.$active.'><a href="?go='.$link.'">'.$title.'</a></li>';
		}

		echo '<ul class="nav navbar-nav">
            '.implode(' ',$links).'</ul>';
	}

	public static function displayRight()
	{
		$menu = Data_Menu::getRightMenu();
		$links = array();
		foreach($menu as $title=>$link)
		{
			$active = $_GET['go'] == $link ? 'class="active"' : '';
			$links[] = '<li '.$active.'><a href="?go='.$link.'">'.$title.'</a></li>';
		}

		echo '<ul class="nav navbar-nav navbar-right">'.implode(' ',$links).'</ul>';
	}
}