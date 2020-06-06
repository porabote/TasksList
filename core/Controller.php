<?php
namespace Core;

use Core\View;

class Controller
{
    public function __construct()
    {
        $className = $this->getClassName();

        $modelPath = '\App\Models\\' . $className;
        $this->model = new $modelPath;

        $this->view = new \Core\View();

        $this->Auth = new \Core\Auth();
    }

    public function getClassName()
    {
        $parts = explode('\\', get_called_class());
        return end($parts);
    }
}
?>