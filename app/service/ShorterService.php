<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace service;

/**
 *
 *
 * @author Mendel <mendel@zzzlab.com>
 */
class ShorterService
{
    public function getShortId(string $fullUrl) : string
    {
        $table = s('dao')->table('short');
        $id = $table->insert([
            'url'=>$fullUrl,
            'created'=>time(),
            'updated'=>time(),
            'ip'=>$_SERVER['REMOTE_ADDR']
        ]);
        //
        return base_convert($id, 10, 36);
    }
    
    public function getFullUrl($shortId) : string
    {
        $id = base_convert($shortId, 36, 10);
        $table = s('dao')->table('short');
        $short = $table->find(['id'=>$id]);
        if (!$short) {
            throw new \mybrand\core\NotFoundException();
        }
        $table->update(['updated'=>time()], ['id'=>$id]);
        //
        return $short['url'];
    }
}
