<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace app;

/**
 *
 *
 * @author Mendel <mendel@zzzlab.com>
 */
class InstallController extends \mybrand\controller\AbstractController
{
    public function defaultAction()
    {
        $this->db->executeWrite('
            CREATE TABLE IF NOT EXISTS `short` (
              `id` bigint(11) NOT NULL AUTO_INCREMENT,
              `url` text NOT NULL,
              `created` int(11) NOT NULL,
              `updated` int(11) NOT NULL,
              `ip` varchar(16) NOT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT = 100;
        ', []);
        echo template('minimalLayout', [
            'title'=>$this->lang->title,
            'content'=> template('article', [
                'header'=>$this->lang->header,
                'text'=>$this->lang->text
            ]),
        ]);
    }
}
