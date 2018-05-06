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
class PageController extends \util\Controller
{
    public function aboutAction()
    {
        echo template('layout', [
            'title'=>$this->lang->title,
            'content'=>template('article', [
                'header'=>$this->lang->header,
                'text'=> $this->lang->text
            ])
        ]);
    }
    
    public function rulesAction()
    {
        echo template('layout', [
            'title'=>$this->lang->title,
            'content'=>template('article', [
                'header'=>$this->lang->header,
                'text'=> $this->lang->text
            ])
        ]);
    }
}
