<?php
/* 
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */

/**
 * Sugar for service locator
 * @param string $name service name
 * @return mixed
 */
function s(string $name)
{
    return \mybrand\core\ServiceLocator::get($name);
}

/**
 * Execute action
 * @param string $route action route
 * @param array $parameters action parameters
 */
function action(string $route, array $parameters = []) : \mybrand\core\ResultInterface
{
    if (haveStr($route, ':')) {
        list($controllerName, $action) = explode(':', $route, 2);
    } else {
        $controllerName = $route;
        $action = 'default';
    }
    $controller = s('controller')->get($controllerName, $parameters);
    return $controller->action($action);
}

/**
 * Check if string contain $needle
 * @param string $haystack
 * @param string $needle
 * @return bool
 */
function haveStr(string $haystack, string $needle) : bool
{
    return (strpos($haystack, $needle) !== false);
}

/**
 * Check if string start from $needle
 * @param string $haystack
 * @param string $needle
 * @return bool
 */
function startFrom(string $haystack, string $needle) : bool
{
     $length = strlen($needle);
     return (substr($haystack, 0, $length) === $needle);
}

/**
 * Check if strin end by $needle
 * @param string $haystack
 * @param string $needle
 * @return bool
 */
function endsBy(string $haystack, string $needle) : bool
{
    $length = strlen($needle);

    return $length === 0 ||
    (substr($haystack, -$length) === $needle);
}
