<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace controller;

/**
 * Index controller
 * Show form or save result
 *
 * @author Mendel <mendel@zzzlab.com>
 */
class IndexController extends \mybrand\controller\AbstractController
{
    /**
     * Default action. Choise next action
     */
    public function defaultAction()
    {
        if (s('post')->exist('short')) {
            return $this->action('result');
        } else {
            return $this->action('form');
        }
    }
    
    /**
     * Internal action for show form
     */
    protected function formAction()
    {
        return s('result')->show(template('layout', [
            'title'=>$this->lang->title,
            'content'=>template('index/form', [
                'header'=>$this->lang->header,
                'text'=>$this->lang->text
            ])
        ]));
    }
    
    /**
     * Internal action for show and save result
     */
    protected function resultAction()
    {
        $fullUrl = s('post')->getSafeArray('short')->getString('url');
        $shortId = s('shorter')->getShortId($fullUrl);
        $shortUrl = $this->urlPrefix.$shortId;
        //
        return s('result')->show(template('layout', [
            'title'=>$this->lang->title,
            'content'=>template('index/result', [
                'header'=>$this->lang->header,
                'text'=>$this->lang->text,
                'url'=>$fullUrl,
                'shortUrl'=>$shortUrl
            ])
        ]));
    }
}
