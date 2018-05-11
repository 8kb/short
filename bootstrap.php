<?php
/* 
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
define('HOME', dirname(__FILE__));
// 
require_once 'vendor/autoload.php';
require_once 'vendor/mybrand/core/functions.php';
require_once 'vendor/mybrand/view/functions.php';
//
\mybrand\core\ServiceLocator::$factory = [
    'error' => '\mybrand\core\ErrorService',
    'get' => '\mybrand\http\Get',
    'post' => '\mybrand\http\Post',
    'result' => '\mybrand\http\Result',
];
//
\mybrand\core\ServiceLocator::$factory['config'] = function() {
    $config = require_once 'config.php';
    return new \mybrand\core\ConfigService($config);
};
//
\mybrand\core\ServiceLocator::$factory['controller'] = function() {
    return new \mybrand\controller\Factory(s('config')->controller);
};
//
\mybrand\core\ServiceLocator::$factory['dao'] = function() {
    $config = s('config')->dao;
    return new \mybrand\dao\mysql\Dao(
        $config['host'],
        $config['baseName'],
        $config['username'],
        $config['password']
    );
};
// configurate view
\mybrand\view\Template::$templateFolder = dirname(__FILE__).'/templ/';
\mybrand\view\Template::$globalVar['config'] = s('config')->template;
// configure lang
\mybrand\core\Lang::$langFolder = dirname(__FILE__).'/lang/';
//
s('error')->init();
$result = require 'vendor/mybrand/core/mainLoop.php';
$result->execute();
