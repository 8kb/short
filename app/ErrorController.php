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
class ErrorController extends \mybrand\controller\AbstractController
{
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
