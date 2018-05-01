<?php
/* 
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
return [
    'debug'=> true, // Enable debug mode. For prodaction - disabled/comment
    'install'=>true, // Install script. For prodaction - disabled/comment 
    'app'=>[
        'favicon' => '/files/s-logo.png',
        'urlPrefix' => 'https:\\\\short.8kb.ru\\',
        'topMenu' => [
            ['url'=>'\page\about','ancor'=>'About'],
            ['url'=>'\page\rules','ancor'=>'Rules'],
        ],
        'sidebarMenu' => [
            ['url'=>'\page\about','ancor'=>'About'],
            ['url'=>'\page\rules','ancor'=>'Rules'],
        ],
    ],
    'db'=> [
        'host'=>'localhost',
        'baseName'=>'dao_db',
        'username'=>'do_user',
        'password'=>'dao_pass'
    ],
];
