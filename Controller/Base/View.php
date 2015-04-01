<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 29.03.2015
 * Time: 21:50
 */
class Controller_Base_View
{
    protected $_template;
    protected $_css;

    function __construct()
    {
        $this->_template = '/View/view.phtml';
        $this->_css = array();
    }
    protected function setTemplate($template)
    {
        $this->_template = $template;
    }

    protected function display()
    {
        $template_path = dirname(__FILE__) .'/../..'. $this->_template;
	    ob_start();
	    include $template_path;
	    return ob_get_clean();
    }

    protected function addCSS($css_path)
    {
        $this->_css[] = $css_path;
    }

}