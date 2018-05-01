<?php
/* 
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
return [
    'debug'=> true, // Enable debug mode. For prodaction - disabled/comment
    'install'=>true, // Install script. For prodaction - disabled/comment 
    'app'=>[ // Array of parameters available in all application blocks
        'favicon' => '/files/s-logo.png',
        'urlPrefix' => 'https:\\\\short.8kb.ru\\', // Prefix added to short url (protocol, domain, folder..)
        'topMenu' => [ // array of url in top menu
            ['url'=>'\page\about','ancor'=>'About'],
            ['url'=>'\page\rules','ancor'=>'Rules'],
        ],
        'sidebarMenu' => [ // array of url in sidebar menu
            ['url'=>'\page\about','ancor'=>'About'],
            ['url'=>'\page\rules','ancor'=>'Rules'],
        ],
    ],
    'db'=> [ // database config (now only MySQL)
        'host'=>'localhost',
        'baseName'=>'dao_db',
        'username'=>'do_user',
        'password'=>'dao_pass'
    ],
];
