<?php

namespace Simple\Core;

class Router
{

    protected $routes = array();
    protected $url;

    public function __construct()
    {
        $this->_init();
    }

    protected function _init()
    {
        $this->url = '';
    }

    public function addRoute(Route $route)
    {
        $this->routes[] = $route;
    }

    protected function findRoute()
    {
        foreach ($this->routes as $route) {
            if ($route->matches($this->url)) {
                return $route;
            }
        }
    }

    public function execute()
    {
        $matched_route = $this->findRoute();

        $controller = $matched_route->getController();
        $action = $matched_route->getAction();

        $view = new View($matched_route->getModule());
        $view->setTemplate($action);

        $controller->setView($view);
        $controller->execute($action);

        $view->render();
    }
}
