<?php
/**
 * Created by PhpStorm.
 * User: i.suhoparov
 * Date: 05.12.14
 * Time: 16:41
 */
class Controller_Exit implements Controller_ControllerInterface
{
    public function execute()
    {
	    destroySession();
	    redirect('/');
    }
}