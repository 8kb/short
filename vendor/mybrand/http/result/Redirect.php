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
class Redirect implements \mybrand\core\ResultInterface
{
    protected $url;
    
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function execute()
    {
        if (!haveStr($this->url, '://')) {
            if (isset($_SERVER[ 'HTTPS']) and $_SERVER[ 'HTTPS']) {
                $protocol = 'https://';
            } else {
                $protocol = 'http://';
            }
            $this->url = $protocol . $_SERVER['HTTP_HOST'] . $this->url;
        }
        header('Location: '.$this->url);
    }
}
