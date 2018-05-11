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
class InternalError extends Found
{
    public function execute()
    {
        @ob_end_clean();
        header("HTTP/1.0 500 Internal Server Error");
        parent::execute();
    }
}
