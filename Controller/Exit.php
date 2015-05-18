<?php
session_start();
/**
 * Created by PhpStorm.
 * User: i.suhoparov
 * Date: 05.12.14
 * Time: 16:41
 */
class Controller_Exit extends Controller_Base_View implements Controller_ControllerInterface
{
    public function init()
    {
        $this->setTemplate('/View/Exit/view.phtml');
    }

    public function execute()
    {
        $this->init();
        $this->go();
        echo $this->display();
    }
    protected function go()
    {
            $date_users = new Data_Users();
            $num_rows = $date_users->search("");
            echo "Пользователей Зарегистрировано  " .$num_rows;
            echo 'Текущая версия PHP: ' . phpversion();
    }

}