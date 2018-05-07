<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace app;

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
        if (post()->exist('short')) {
            $this->action('result');
        } else {
            $this->action('form');
        }
    }
    
    /**
     * Internal action for show form
     */
    protected function formAction()
    {
        echo template('layout', [
            'title'=>$this->lang->title,
            'content'=>template('index/form', [
                'header'=>$this->lang->header,
                'text'=>$this->lang->text
            ])
        ]);
    }
    
    /**
     * Internal action for show and save result
     */
    protected function resultAction()
    {
        $shortForm = post()->getSafeArray('short');
        $id = $this->db->table('short')->insert([
            'url'=>$shortForm->getString('url'),
            'created'=>time(),
            'updated'=>time(),
            'ip'=>$_SERVER['REMOTE_ADDR']
        ]);
        //
        $shortId = base_convert($id, 10, 36);
        $shortUrl = $this->config['urlPrefix'].$shortId;
        echo template('layout', [
            'title'=>$this->lang->title,
            'content'=>template('index/result', [
                'header'=>$this->lang->header,
                'text'=>$this->lang->text,
                'url'=>$shortForm->getString('url'),
                'shortUrl'=>$shortUrl
            ])
        ]);
    }
}
