<?php
namespace Simple\Core;

function autoload($class)
{
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php';

    $file = PATH_BASE.DIRECTORY_SEPARATOR.str_replace('Simple'.DIRECTORY_SEPARATOR, '', $file);

    if (file_exists($file)) {
        include $file;
    }

}

\spl_autoload_register('Simple\Core\autoload');

require_once PATH_BASE.'/vendor/twig/twig/lib/Twig/Autoloader.php';
\Twig_Autoloader::register();
