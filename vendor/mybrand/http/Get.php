<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace mybrand\http;

/**
 * Safe _GET array
 *
 * @author Mendel <mendel@zzzlab.com>
 */
class Get extends SafeArray
{
    /**
     * Constructor
     */
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
