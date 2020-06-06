<?php
namespace Core;

class View
{
    private $view;
    public $data = [];

    function render($view, $layout = 'Default.php')
    {
        $this->view = $view;

        include ROOT . '/src/Views/Layout/' . $layout;
    }

    function fetch()
    {
        include ROOT . '/src/Views/' . $this->view;
    }

    function setData($data)
    {
        $this->data = array_merge($data, $this->data);
    }

}
?>