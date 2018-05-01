<?php
/* 
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
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
    return new \http\Post();
}

function get()
{
    return new \http\Get();
}