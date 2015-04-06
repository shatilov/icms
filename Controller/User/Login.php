<?php
/**
 * Created by PhpStorm.
 * User: i.suhoparov
 * Date: 05.12.14
 * Time: 16:41
 */
class Controller_User_Login extends Controller_Base_View implements Controller_Interface_Base
{
    public function init()
    {
        $this->setTemplate('/View/Login/view.phtml');
    }

    public function execute()
    {
        $this->init();

        $this->process();

        echo $this->display();
    }

    protected function process()
    {
        if($_POST)
        {

            $users = new Data_Users();

            $login = $_POST['username'];
            $password = $_POST['password'];

            if($users->login($login,$password))
            {
	            redirect('/');
                $this->setTemplate('/View/Exit/view.phtml');
	            // ТУТ РЕДИРЕКТ НА ГЛАВНУЮ А НЕ ПОДМЕНА ШАБЛОНА
                echo $this->display();
            }
            else
            {
	            $this->assign('message','Неправильный логин или пароль');
            }
        }
    }
}