<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace controller;

/**
 * Page controller
 *
 * @author Mendel <mendel@zzzlab.com>
 */
class PageController extends \mybrand\controller\AbstractController
{
    /**
     * About page
     */
    public function aboutAction()
    {
        return s('result')->show(template('layout', [
            'title'=>$this->lang->title,
            'content'=>template('article', [
                'header'=>$this->lang->header,
                'text'=> $this->lang->text
            ])
        ]));
    }
    
    /**
     * Rules page
     */
    public function rulesAction()
    {
        return s('result')->show(template('layout', [
            'title'=>$this->lang->title,
            'content'=>template('article', [
                'header'=>$this->lang->header,
                'text'=> $this->lang->text
            ])
        ]));
    }
}
