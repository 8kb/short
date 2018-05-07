<?php
/* 
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */

function action(string $route, $param = [])
{
    \mybrand\controller\Factory::doAction($route, $param);
    ;
}
