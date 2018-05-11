<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace controller;

/**
 * Redirect controller
 *
 * @author Mendel <mendel@zzzlab.com>
 */
class RedirectController extends \mybrand\controller\AbstractController
{
    /**
     * Redirect to full url if any
     * @throws \mybrand\core\NotFoundException
     */
    public function defaultAction()
    {
        $url = s('shorter')->getFullUrl($this->shortId);
        return s('result')->redirect($url);
    }
}
