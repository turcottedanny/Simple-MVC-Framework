<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

define('PATH_BASE', dirname(__FILE__));

include('Core/autoload.php');


$router = new Simple\Core\Router();

$router->addRoute(new Simple\Core\Route('/', 'basic', 'index'));

$router->execute();
