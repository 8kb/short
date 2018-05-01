<?php
/* 
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
$shortForm = post()->getSafeArray('short');
$id = $db->table('short')->insert([
    'url'=>$shortForm->getString('url'),
    'created'=>time(),
    'updated'=>time(),
    'ip'=>$_SERVER['REMOTE_ADDR']
]);
//
$shortId = base_convert($id, 10, 36);
$shortUrl = $config['urlPrefix'].$shortId;
echo template('templ/layout', [
    'title'=>$_->title,
    'content'=>template('templ/short/result', [
        'header'=>$_->header,
        'text'=>$_->text,
        'url'=>$shortForm->getString('url'),
        'shortUrl'=>$shortUrl
    ])
]);