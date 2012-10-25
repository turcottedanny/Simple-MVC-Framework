<?php

use Simple\Core\Route as Route;

$router->addRoute(new Route('/', 'basic', 'index'));
$router->addRoute(new Route('/:name', 'basic', 'allo'));

