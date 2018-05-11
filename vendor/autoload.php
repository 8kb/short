<?php
/* 
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
spl_autoload_register(function ($class) {
    $parts = explode('\\', $class);
    $filename = HOME.'/app/'.implode('/', $parts).'.php';
    if (!file_exists($filename)) {
        $filename = HOME.'/vendor/'.implode('/', $parts).'.php';
    }
    if (file_exists($filename)) {
        require_once($filename);
    }
});
