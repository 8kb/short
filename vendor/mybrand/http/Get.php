<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace mybrand\http;

/**
 *
 *
 * @author Mendel <mendel@zzzlab.com>
 */
class Get extends \mybrand\util\SafeArray
{
    public function __construct()
    {
        if (isset($_GET)) {
            $array = $_GET;
        } else {
            $array = [];
        }
        parent::__construct($array);
    }
}
