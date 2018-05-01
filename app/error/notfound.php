<?php
/* 
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
echo template('templ/layout', [
    'title'=>$_->title,
    'content'=> template('templ/article', ['header'=>$_->header, 'text'=>$_->text]),
]);
