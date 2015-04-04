<?php
/**
 * Created by PhpStorm.
 * User: i.suhoparov
 * Date: 05.12.14
 * Time: 16:41
 */
class Controller_Login extends Controller_Base_View implements Controller_ControllerInterface
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

            $date_users = new Data_Users();

            $login = $_POST['username'];
            $password = $_POST['password'];

            if($date_users->login($login,$password))
            {
                echo 'Вы зашли на сайт';
                $this->setTemplate('/View/Exit/view.phtml');
                echo $this->display();


            }
            else{
                echo 'Неправильный логин или пароль';
            }
        }
    }
}