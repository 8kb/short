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
class NotFound extends Found
{
    public function execute()
    {
        header("HTTP/1.0 404 Not Found");
        parent::execute();
    }
}
