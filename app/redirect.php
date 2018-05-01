<?php
/* 
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */

$id = base_convert($shortId, 36, 10);
$table = $db->table('short');
$short = $table->find(['id'=>$id]);
$table->update(['updated'=>time()], ['id'=>$id]);
redirect($short['url']);