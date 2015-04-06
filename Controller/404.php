<?php
/**
 * Created by PhpStorm.
 * User: i.suhoparov
 * Date: 05.12.14
 * Time: 17:06
 */
class Controller_404 extends Controller_Base_View  implements Controller_Interface_Base
{
    public function init()
    {
        $this->setTemplate('/View/404/view.phtml');
    }
	public function execute()
	{
        $this->init();
        echo $this->display();
	}
}