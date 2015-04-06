<?php
require_once dirname(__FILE__) . '/Core/functions.php';
require_once dirname(__FILE__) . '/Core/autoloader.php';
require_once dirname(__FILE__) . '/Core/medoo.php';
require_once dirname(__FILE__) . '/Core/session.php';

startSession();

$controllers = require_once dirname(__FILE__) . '/Core/controllers.php';
$controller = isset($_GET['go']) && !empty($_GET['go']) ? $_GET['go'] : 'index';

/**
 * @var Controller_Interface_Base|Core_Classes_Jsonp $Controller
 */
if(isset($controllers[$controller]) && class_exists($controllers[$controller]))
{
	$Controller = new $controllers[$controller]();
}
else
{
	$Controller = new Controller_404();
}

try
{
	if($Controller instanceof Controller_Interface_Access)
	{
		$Controller->checkAccess();
	}
	$Controller->execute();
}
catch(Exception $e)
{
	// тут просто редирект на главную
	echo '<pre>';
	print_r($e);

}


$page_template = 'index.html';
$template_path = '/View/';
$PAGE_BODY = ob_get_contents();ob_end_clean();ob_start();
include_once dirname(__FILE__) . $template_path . $page_template;