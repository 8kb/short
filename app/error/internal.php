<?php
/* 
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
echo template('templ/minimalLayout', [
    'title'=>$_->title,
    'content'=> template('templ/error/internal', [
        'header'=>$_->header,
        'text'=>$_->text,
        'exception'=>$exception
    ]),
]);