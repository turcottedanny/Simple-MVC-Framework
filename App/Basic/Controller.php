<?php
namespace Simple\App\Basic;

use Simple\Core\Controller as BaseController;

class Controller extends BaseController
{
    public function index()
    {
        $this->view->addParameter('name', 'Vikie');
    }

    public function allo()
    {
        $this->view->setTemplate('index');
    }
}
