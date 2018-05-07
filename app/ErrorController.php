<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace app;

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
        echo template('layout', [
            'title'=>$this->lang->title,
            'content'=> template('article', [
                'header'=>$this->lang->header,
                'text'=>$this->lang->text
            ]),
        ]);
    }
    
    /**
     * Action if access denied
     */
    public function forbiddenAction()
    {
        echo template('layout', [
            'title'=>$this->lang->title,
            'content'=> template('article', [
                'header'=>$this->lang->header,
                'text'=>$this->lang->text
            ]),
        ]);
    }
    
    /**
     * Action if internal error
     */
    public function internalAction()
    {
        echo template('minimalLayout', [
            'title'=>$this->lang->title,
            'content'=> template('error/internal', [
                'header'=>$this->lang->header,
                'text'=>$this->lang->text,
                'exception'=>$this->exception
            ]),
        ]);
    }
}
