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
        $this->_css = array();
    }
    protected function setTemplate($template)
    {
        $this->_template = $template;
    }

    protected function display()
    {
        $template_path = dirname(__FILE__) .'/../../'. $this->_template;
        //fatal($template_path , 1);
        $html = require_once($template_path);
        echo $html;
    }

    protected function addCSS($css_path)
    {
        $this->_css[] = $css_path;
    }

}