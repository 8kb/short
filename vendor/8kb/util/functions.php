<?php
/* 
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */

function haveStr($str, $needle)
{
    return (strpos($str, $needle) !== false);
}

function startFrom($haystack, $needle)
{
     $length = strlen($needle);
     return (substr($haystack, 0, $length) === $needle);
}

function endsBy($haystack, $needle)
{
    $length = strlen($needle);

    return $length === 0 || 
    (substr($haystack, -$length) === $needle);
}

function action(string $route, $param = [])
{
    \util\Controller::doAction($route, $param);;
}

/**
 * Redirect
 * @param type $url
 */
function redirect($url)
{
    if (!haveStr($url, '://')) {
        if (isset($_SERVER[ 'HTTPS']) and $_SERVER[ 'HTTPS']) {
            $protocol = 'https://';
        } else {
            $protocol = 'http://';
        }
        $url = $protocol . $_SERVER['HTTP_HOST'] . $url;
    }
    header('Location: '.$url);
}

function post()
{
    return new \util\http\Post();
}

function get()
{
    return new \util\http\Get();
}