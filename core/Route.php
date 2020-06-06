<?php
namespace Core;

class Route
{
    public static $controller;
    public static $action = 'index';

    static function start()
    {
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        if(count($routes) > 2) array_shift($routes);

        list($controllerName, $actionName) = $routes;

        $controllerName = ($controllerName) ? sprintf('\App\Controllers\%s', ucfirst($controllerName)) : '\App\Controllers\Tasks';
        $actionName = ($actionName) ? $actionName : 'index';

        $controller = new $controllerName;

        if(method_exists($controller, $actionName))
        {
            $controller->$actionName();
        }
        else
        {
            Route::errorPage404();
        }

    }

    //TODO Error Page
    function errorPage404()
    {
        echo 'Страницы не существует';
    }
}
?>