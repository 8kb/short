<?php
/* 
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
spl_autoload_register(function ($class) {
    $parts = explode('\\', $class);
    if($parts[0] == 'app') {
        $filename = HOME.'/'.implode('/', $parts).'.php';
    } else {
        $filename = HOME.'/vendor/8kb/'.implode('/', $parts).'.php';
    }
    if (file_exists($filename)) {
        require_once($filename);
    }
});

