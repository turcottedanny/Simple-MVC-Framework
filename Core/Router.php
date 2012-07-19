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
        $base_paths = explode('/', $_SERVER['SCRIPT_NAME']);
        array_pop($base_paths);

        $this->url = str_replace(implode('/', $base_paths), '', $_SERVER['REQUEST_URI']);
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

        if (!$matched_route) {
            header('404 Not found');
            die('Not found');
        }

        $controller = $matched_route->getController();
        $action = $matched_route->getAction();

        $view = new View($matched_route->getModule());
        $view->addParameters($matched_route->getParams());
        $view->setTemplate($action);

        $controller->setView($view);
        $controller->execute($action);

        $view->render();
    }
}
