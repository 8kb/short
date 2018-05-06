<?php
/* 
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
$config = require_once 'config.php';
define('HOME', dirname(__FILE__));
// 
require_once 'vendor/autoload.php';
require_once 'vendor/mybrand/util/error.php';
require_once 'vendor/mybrand/controller/functions.php';
require_once 'vendor/mybrand/http/functions.php';
require_once 'vendor/mybrand/util/functions.php';
require_once 'vendor/mybrand/view/functions.php';
// configurate view
\mybrand\view\Template::$templateFolder = dirname(__FILE__).'/templ/';
\mybrand\view\Template::$globalVar['config'] = $config['template'];
// configure lang
\mybrand\util\Lang::$langFolder = dirname(__FILE__).'/lang/';
// configure controller
\mybrand\controller\Factory::$globalVar['config'] = $config['app'];
// configure DAO
$db = new \mybrand\dao\mysql\Dao(
        $config['db']['host'],
        $config['db']['baseName'],
        $config['db']['username'],
        $config['db']['password']
    );
    \mybrand\controller\Factory::$globalVar['db'] = $db;
//
if(isset($config['install']) and $config['install']) {
    action('install');
} else {
    require 'vendor/mybrand/util/mainLoop.php';
}