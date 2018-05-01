<?php
/* 
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
//
if(post()->exist('short')) {
    echo template('app/short/result');
} else {
    echo template('app/short/form');
}
