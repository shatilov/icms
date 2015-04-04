<?php
/**
 * Created by PhpStorm.
 * User: i.suhoparov
 * Date: 05.12.14
 * Time: 16:41
 */
class Controller_Register extends Controller_Base_View implements Controller_ControllerInterface
{
    public function init()
    {
        $this->setTemplate('/View/Register/view.phtml');
    }

    public function execute()
    {
        $this->init();

        $this->process();

        echo $this->display();
    }

    protected function process()
    {
        if ($_POST) {
            $date_users = new Data_Users();
            $date_users->add();

            $login = $_POST['login'];
            $num_rows = $date_users->search($login);
            if ($num_rows == 0) {
                if ($_POST['password1'] == $_POST['password2']) {
                    $password = $_POST['password1'];
                    $secondname = $_POST['secondname'];
                    $email = $_POST['email'];
                   // $name = $_POST['name'];
                    $name= $_POST['name'];
                    $sex = $_POST['sex'];
                    if ($date_users->creteUser($login, $password, $secondname, $email, $name,$sex)) {
                        echo 'Успешно добавлено';
                    }
                } else {
                    echo 'Параоли не савподают';

                }
            } else {
                echo 'Пользователь с таким именем уже существует!';

            }

        }
    }
}