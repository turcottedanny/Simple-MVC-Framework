<?php
namespace Simple\Core;


class Route
{
    protected $url;
    protected $module;
    protected $action_name;

    public function __construct($url, $module, $action_name)
    {
        $this->url = $url;
        $this->module = $module;
        $this->action_name = $action_name;
    }

    public function matches($url)
    {
        return true;
    }

    public function getAction()
    {
       return $this->action_name;
    }

    public function getModule()
    {
        return $this->module;
    }

    public function getController()
    {
        $module = ucfirst($this->module);
        $controller = 'Simple\App\\'.$module.'\Controller';

        return new $controller;
    }
}
