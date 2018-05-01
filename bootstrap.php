<?php
/* 
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
$config = require_once 'config.php';
define('HOME', dirname(__FILE__));
// 
require 'core/autoload.php';
require 'core/error.php';
require_once 'core/view/functions.php';
require_once 'core/http/functions.php';
// configurate core
\view\Template::$templateFolder = dirname(__FILE__).'/';
\view\Lang::$langFolder = dirname(__FILE__).'/lang/';
//
\view\Template::$globalVar['config'] = $config['app'];
$db = new \dao\mysql\Dao(
        $config['db']['host'],
        $config['db']['baseName'],
        $config['db']['username'],
        $config['db']['password']
    );
\view\Template::$globalVar['db'] = $db;
//
if(isset($config['install']) and $config['install']) {
    echo template('install');
} else {
    require 'core/mainLoop.php';
}