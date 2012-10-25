<?php

//Setting the config
require_once('config.php');

//Autoload that follows PSR-0
require_once('Core/autoload.php');

//Instantiate the router
$router = new Simple\Core\Router();

//Addind routes to the router
require_once('routes.php');

//Executing the router, it will match the current url to a route and execute the corresponding controller
$router->execute();
