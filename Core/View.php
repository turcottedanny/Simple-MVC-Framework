<?php
namespace Simple\Core;


class View
{

    protected $template;
    protected $module;
    protected $parameters = array();

    public function __construct($module)
    {
        $this->module = $module;
    }

    public function render()
    {
        $loader = new \Twig_Loader_Filesystem(PATH_BASE.DIRECTORY_SEPARATOR.'App'.DIRECTORY_SEPARATOR);
        $twig = new \Twig_Environment($loader);

        echo $twig->render(ucfirst($this->module).DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.$this->template.'.html.twig', $this->parameters);
    }

    public function setTemplate($template)
    {
        $this->template = $template;
    }

    public function addParameter($name, $value)
    {
        $this->parameters[$name] = $value;
    }

}
