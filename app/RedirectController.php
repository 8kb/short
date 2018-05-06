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
class RedirectController extends \mybrand\controller\AbstractController
{
    public function defaultAction()
    {
        $id = base_convert($this->shortId, 36, 10);
        $table = $this->db->table('short');
        $short = $table->find(['id'=>$id]);
        if(!$short) {
            throw new \mybrand\http\NotFoundException();
        }
        $table->update(['updated'=>time()], ['id'=>$id]);
        redirect($short['url']);
    }
}
