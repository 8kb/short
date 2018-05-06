<?php
/* 
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
addAsset('HeadCss','https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
addAsset('HeadCss', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');
addAsset('FooterJs','https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js');
addAsset('FooterJs','https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');

echo template('html', [
    'title'=>$title,
    'content'=> template('layout/standartStructure', [
        'content'=>$content,
        'topMenu'=>$config['topMenu'],
        'sidebarMenu'=>$config['sidebarMenu']
    ])
]);