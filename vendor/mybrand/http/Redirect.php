<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace mybrand\http;

/**
 *
 *
 * @author Mendel <mendel@zzzlab.com>
 */
class Redirect
{
    public static function redirect(string $url)
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
    
}
