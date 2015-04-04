<?php
/**
 * Created by PhpStorm.
 * User: i.suhoparov
 * Date: 05.12.14
 * Time: 16:41
 */
class Controller_View extends Controller_Base_View implements Controller_ControllerInterface
{
	public function execute()
	{
        echo $this->display();
	}


}