<?php
/* 
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */

/**
 * Redirect
 * @param url $url
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

/**
 * Get safe _POST array (sugar)
 * @return \mybrand\http\Post
 */
function post() : \mybrand\http\Post
{
    return new \mybrand\http\Post();
}

/**
 * Get safe _GET array (sugar)
 * @return \mybrand\http\Get
 */
function get() : \mybrand\http\Get
{
    return new \mybrand\http\Get();
}
