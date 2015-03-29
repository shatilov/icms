<?php
/**
 * Created by PhpStorm.
 * User: shatilov
 * Date: 05.12.14
 * Time: 16:41
 */
class Controller_CreateUser extends Controller_Base_View implements Controller_ControllerInterface
{
    public function init()
    {
        fatal($_POST);
        $this->setTemplate('/View/CreateUser/view.phtml');
    }

    public function execute()
    {
        $this->init();

        $this->process();

        $this->display();
    }

    protected function process()
    {
        if($_POST)
        {
            $date_users = new Data_Users();

            $login = $_POST['login'];
            $password = $_POST['password'];
            $fullname = $_POST['fullname'];

            if($date_users->creteUser($login,$password,$fullname))
            {
                echo 'Успешно добавлено';
            }
        }
    }
}