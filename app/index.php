<?php
/* 
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
//
if(post()->exist('short')) {
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
        'title'=>$_->resultTitle,
        'content'=>template('templ/short/result', [
            'header'=>$_->resultHeader,
            'text'=>$_->resultText,
            'url'=>$shortForm->getString('url'),
            'shortUrl'=>$shortUrl
        ])
    ]);
} else {
    echo template('templ/layout', [
        'title'=>$_->formTitle,
        'content'=>template('templ/short/form', [
            'header'=>$_->formHeader,
            'text'=>$_->formText
        ])
    ]);
}
