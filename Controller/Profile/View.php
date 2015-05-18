<?php
/**
 * Created by PhpStorm.
 * User: shatilov
 * Date: 06.04.15
 * Time: 15:08
 */
class Controller_Profile_View extends Controller_Base_View implements Controller_Interface_Base, Controller_Interface_Access
{
	public function init()
	{
		$this->setTemplate('/View/Profile/view.phtml');
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



	}
    public  static  function  gl(){
        $user = Data_CurrentUser::get();
        echo  $user->getLogin();
    }
    public  static  function  gl3(){
        $user = Data_CurrentUser::get();
        return $user;
    }
}
