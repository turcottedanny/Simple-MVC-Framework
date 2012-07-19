<?php
namespace Simple\Core;


class Route
{
    protected $url;
    protected $module;
    protected $action_name;
    protected $params = array();

    public function __construct($url, $module, $action_name)
    {
        $this->url = $url;
        $this->module = $module;
        $this->action_name = $action_name;
    }

    public function matches($url)
    {
        if ($this->url == $url && strpos(':', $this->url) === false) {
            return true;
        }

        $route = explode('/', $this->url);
        $url = explode('/', $url);
        $matches = 0;

        foreach ($route as $index => $expr) {
            if ($expr && $expr[0] == ':') {
                $this->params[substr($expr, 1)] = $url[$index];
                $matches++;
            } elseif ($expr == $url[$index]) {
                $matches++;
            }

        }

        return $matches == count($url);
    }

    public function getParams()
    {
        return $this->params;
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
