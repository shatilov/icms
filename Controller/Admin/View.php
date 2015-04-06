<?php
/**
 * Created by PhpStorm.
 * User: shatilov
 * Date: 06.04.15
 * Time: 15:08
 */
class Controller_Admin_View extends Controller_Base_View implements Controller_Interface_Base, Controller_Interface_Access
{
	public function init()
	{
		$this->setTemplate('/View/Admin/view.phtml');
	}

	public function execute()
	{
		$this->init();
		echo $this->display();
	}

	public function checkAccess()
	{
		$user = Data_CurrentUser::get();
		if(!$user)
		{
			throw new Exception('Нет доступа');
		}

		if(!$user->isAdmin())
		{
			throw new Exception('Нет доступа');
		}
	}
}
