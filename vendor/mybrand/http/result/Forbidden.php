<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace mybrand\http\result;

/**
 *
 *
 * @author Mendel <mendel@zzzlab.com>
 */
class Forbidden extends Found
{
    public function execute()
    {
        header("HTTP/1.0 403 Forbidden");
        parent::execute();
    }    
}
