<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace app;

/**
 * Redirect controller
 *
 * @author Mendel <mendel@zzzlab.com>
 */
class RedirectController extends \mybrand\controller\AbstractController
{
    /**
     * Redirect to full url if any
     * @throws \mybrand\core\NotFoundException
     */
    public function defaultAction()
    {
        $id = base_convert($this->shortId, 36, 10);
        $table = $this->db->table('short');
        $short = $table->find(['id'=>$id]);
        if (!$short) {
            throw new \mybrand\core\NotFoundException();
        }
        $table->update(['updated'=>time()], ['id'=>$id]);
        redirect($short['url']);
    }
}
