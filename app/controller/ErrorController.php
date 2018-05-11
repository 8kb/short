<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace controller;

/**
 * Error controller
 *
 * @author Mendel <mendel@zzzlab.com>
 */
class ErrorController extends \mybrand\controller\AbstractController
{
    /**
     * Action if page not found
     */
    public function notfoundAction()
    {
        return s('result')->showNotFound(template('layout', [
            'title'=>$this->lang->title,
            'content'=> template('article', [
                'header'=>$this->lang->header,
                'text'=>$this->lang->text
            ]),
        ]));
    }
    
    /**
     * Action if access denied
     */
    public function forbiddenAction()
    {
        return s('result')->showForbidden(template('layout', [
            'title'=>$this->lang->title,
            'content'=> template('article', [
                'header'=>$this->lang->header,
                'text'=>$this->lang->text
            ]),
        ]));
    }
    
    /**
     * Action if internal error
     */
    public function internalAction()
    {
        return s('result')->showInternal(template('layout', [
            'title'=>$this->lang->title,
            'content'=> template('error/internal', [
                'header'=>$this->lang->header,
                'text'=>$this->lang->text,
                'exception'=>$this->exception,
                'debug'=>s('config')->debug
            ]),
        ]));
    }
}
