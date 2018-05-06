<?php
/* 
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
ini_set('error_reporting', E_ALL);
if(isset($config['debug']) and $config['debug']) {
    define('DEBUG', true);
    ini_set('display_errors', 'on');
    ini_set('display_startup_errors', 'on');    
}
set_error_handler(function($severity, $message, $file, $line) {
    if (!(error_reporting() & $severity)) {
        return false;
    } else {
        throw new \ErrorException($message, 0, $severity, $file, $line);
    }
});

