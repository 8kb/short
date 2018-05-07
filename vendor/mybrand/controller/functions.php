<?php
/* 
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */

/**
 * Execute action
 * @param string $route action route
 * @param array $parameters action parameters
 */
function action(string $route, array $parameters = [])
{
    if (haveStr($route, ':')) {
        list($controllerName, $action) = explode(':', $route, 2);
    } else {
        $controllerName = $route;
        $action = 'default';
    }
    $controller = \mybrand\controller\Factory::get($controllerName, $parameters);
    $controller->action($action);
}
