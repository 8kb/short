<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace mybrand\core;

/**
 *
 *
 * @author Mendel <mendel@zzzlab.com>
 */
class ErrorService
{
    public function init()
    {
        ini_set('error_reporting', E_ALL);
        if (s('config')->debug) {
            ini_set('display_errors', 'on');
            ini_set('display_startup_errors', 'on');
        }
        set_error_handler([$this, 'errorHandler']);
    }
    
    public function errorHandler($severity, $message, $file, $line)
    {
        if (!(error_reporting() & $severity)) {
            return false;
        } else {
            throw new \ErrorException($message, 0, $severity, $file, $line);
        }
    }
}
