<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace app;

/**
 *
 *
 * @author Mendel <mendel@zzzlab.com>
 */
class ErrorController extends \util\Controller
{
    protected function notfoundAction()
    {
        echo template('layout', [
            'title'=>$this->lang->title,
            'content'=> template('article', [
                'header'=>$this->lang->header,
                'text'=>$this->lang->text
            ]),
        ]);
    }
    
    protected function forbiddenAction()
    {
        echo template('layout', [
            'title'=>$this->lang->title,
            'content'=> template('article', [
                'header'=>$this->lang->header,
                'text'=>$this->lang->text
            ]),
        ]);
    }
    
    protected function internalAction()
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
