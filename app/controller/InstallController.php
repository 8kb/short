<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace controller;

/**
 * Install controller
 *
 * @author Mendel <mendel@zzzlab.com>
 */
class InstallController extends \mybrand\controller\AbstractController
{
    /**
     * Default action - install
     */
    public function defaultAction()
    {
        s('dao')->executeWrite('
            CREATE TABLE IF NOT EXISTS `short` (
              `id` bigint(11) NOT NULL AUTO_INCREMENT,
              `url` text NOT NULL,
              `created` int(11) NOT NULL,
              `updated` int(11) NOT NULL,
              `ip` varchar(16) NOT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT = 100;
        ', []);
        return s('result')->show(template('minimalLayout', [
            'title'=>$this->lang->title,
            'content'=> template('article', [
                'header'=>$this->lang->header,
                'text'=>$this->lang->text
            ]),
        ]));
    }
}
