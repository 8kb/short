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
class IndexController extends \mybrand\controller\AbstractController
{
    public function defaultAction()
    {
        if (post()->exist('short')) {
            $this->saveResult();
        } else {
            $this->showForm();
        }
    }
    
    protected function showForm()
    {
        echo template('layout', [
            'title'=>$this->lang->form['title'],
            'content'=>template('index/form', [
                'header'=>$this->lang->form['header'],
                'text'=>$this->lang->form['text']
            ])
        ]);
    }
    
    protected function saveResult()
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
            'title'=>$this->lang->result['title'],
            'content'=>template('index/result', [
                'header'=>$this->lang->result['header'],
                'text'=>$this->lang->result['text'],
                'url'=>$shortForm->getString('url'),
                'shortUrl'=>$shortUrl
            ])
        ]);
    }
}
