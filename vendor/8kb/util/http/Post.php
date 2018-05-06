<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace util\http;

/**
 *
 *
 * @author Mendel <mendel@zzzlab.com>
 */
class Post extends \util\SafeArray
{
    public function __construct()
    {
        if(isset($_POST)) {
            $array = $_POST;
        } else {
            $array = [];
        }
        parent::__construct($array);
    }
}