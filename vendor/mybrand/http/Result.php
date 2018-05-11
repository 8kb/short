<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace mybrand\http;

use \mybrand\core\ResultInterface;

/**
 *
 *
 * @author Mendel <mendel@zzzlab.com>
 */
class Result
{
    public function show(string $content) : ResultInterface
    {
        return new result\Found($content);
    }

    public function showForbidden(string $content) : ResultInterface
    {
        return new result\Forbidden($content);
    }
    
    public function showNotFound(string $content) : ResultInterface
    {
        return new result\NotFound($content);
    }

    public function showInternal(string $content) : ResultInterface
    {
        return new result\InternalError($content);
    }

    public function redirect($url) : ResultInterface
    {
        return new result\Redirect($url);
    }
}
