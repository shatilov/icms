<?php
/**
 * Created by PhpStorm.
 * User: shatilov
 * Date: 06.04.15
 * Time: 15:08
 */
class Controller_book_View extends Controller_Base_View implements Controller_Interface_Base
{
	public function init()
	{
		$this->setTemplate('/View/book/view.phtml');
	}

	public function execute()
	{
		$this->init();
		echo $this->display();
        $this->comment();
	}

    public function comment(){
        if ($_POST) {
            if($_POST["comm"]){
                $cmts = new Data_Comments();
                $tex=$_POST["comm"];
                $user = Data_CurrentUser::get();
                $cmts->add($tex,$_GET['id'],$user->getId());
                redirect('/?go=book&id=' . $_GET['id']);

            }

        }

    }

    public static function  gl(){
        $user = Data_CurrentUser::get();
        echo  $user->getLogin();
    }
    public  static  function  gl3(){
        $user = Data_CurrentUser::get();
        return $user;
    }
    public static function process($b)
    {
        $date_book = new Data_book();
       if( $date_book->search($b))
           return $date_book->search($b) ;
        else
            return "Такой книги не существует";
    }
}
