<?php
/* 
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
$db->executeWrite('
    CREATE TABLE IF NOT EXISTS `short` (
      `id` bigint(11) NOT NULL AUTO_INCREMENT,
      `url` text NOT NULL,
      `created` int(11) NOT NULL,
      `updated` int(11) NOT NULL,
      `ip` varchar(16) NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT = 100;
',[]);
echo template('templ/minimalLayout', [
    'title'=>$_->title,
    'content'=> template('templ/article', ['header'=>$_->header, 'text'=>$_->text]),
]);
