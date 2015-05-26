<?php
/**
 * Created by PhpStorm.
 * User: i.suhoparov
 * Date: 05.12.14
 * Time: 16:41
 */
class Controller_book_addbook extends Controller_Base_View implements Controller_Interface_Base, Controller_Interface_Access
{

    public function init()
    {
        $this->setTemplate('/View/book/add.phtml');
    }

    public function execute()
    {
        $this->process();

        $this->init();

        echo $this->display();
    }

    public function checkAccess()
    {
        $user = Data_CurrentUser::get();

        if (!$user) {
            throw new Exception('Нет доступа');
        }

        if (!$user->isAdmin()) {
            throw new Exception('Нет доступа');
        }
    }
    protected function process()
    {
        if ($_FILES["pictures"]) {
            foreach ($_FILES["pictures"]["error"] as $key => $error) {
                if ($error == UPLOAD_ERR_OK) {
                    $tmp_name = $_FILES["pictures"]["tmp_name"][$key];
                    $name =md5(date("Y-m-d H:i:s")).".jpg";
                    $name = "View/image/".$name;
                    move_uploaded_file($tmp_name, $name);
                }
            }
            $img = new Data_image();
            $img_id=$img->add($name,date("Y-m-d H:i:s"));
            if(!$name)
                $img_id=1;
        }
        if ($_POST) {
            $book= new Data_book();
            $name = $_POST["name"];
            $author = $_POST["author"];
            $ganre = $_POST["ganre"];
            $year = $_POST["year"];
            $book_id = $book->add($name,$author,$ganre, $year,$img_id);
            redirect('/?go=book&id=' . $book_id); // сделать переброс на добавленую страницу
        }

    }
}