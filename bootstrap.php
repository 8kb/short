<?php
/* 
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
$config = require_once 'config.php';
define('HOME', dirname(__FILE__));
// 
require 'vendor/autoload.php';
require 'vendor/8kb/util/error.php';
require_once 'vendor/8kb/view/functions.php';
require_once 'vendor/8kb/util/functions.php';
// configurate view
\view\Template::$templateFolder = dirname(__FILE__).'/templ/';
\view\Template::$globalVar['config'] = $config['template'];
// configure lang
\lang\Lang::$langFolder = dirname(__FILE__).'/lang/';
// configure controller
\util\Controller::$globalVar['config'] = $config['app'];
// configure DAO
$db = new \dao\mysql\Dao(
        $config['db']['host'],
        $config['db']['baseName'],
        $config['db']['username'],
        $config['db']['password']
    );
\util\Controller::$globalVar['db'] = $db;
//
if(isset($config['install']) and $config['install']) {
    action('install:install');
} else {
    require 'vendor/8kb/util/mainLoop.php';
}