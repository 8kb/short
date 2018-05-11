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
class Found implements \mybrand\core\ResultInterface
{
    protected $content;
    
    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public function execute()
    {
        echo $this->content;
    }
}
