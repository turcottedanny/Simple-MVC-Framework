<?php
namespace Simple\Core;

class Controller
{
    protected $view;

    public function __construct()
    {

    }

    public function setView(View $view)
    {
        $this->view = $view;
    }

    public function execute($action)
    {
        call_user_func_array(array($this, $action), array());
    }
}
