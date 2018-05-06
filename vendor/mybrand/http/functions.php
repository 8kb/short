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
    \mybrand\http\Redirect::redirect($url);
}

function post()
{
    return new \mybrand\http\Post();
}

function get()
{
    return new \mybrand\http\Get();
}
