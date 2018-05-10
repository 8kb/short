<?php
/* 
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
return [
    'debug'=> true, // Enable debug mode. For prodaction - disabled/comment
    'install'=>true, // Install script. For prodaction - disabled/comment 
    'controller'=>[ // Config for controllers. 2DO: port config system from DryCart
        'urlPrefix' => 'https:\\\\short.8kb.ru\\', // Prefix added to short url (protocol, domain, folder..)
    ],
    'template'=>[ // Array of parameters available in template blocks
        'favicon' => '/files/s-logo.png',
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
        'baseName'=>'db_name',
        'username'=>'db_user',
        'password'=>'db_pass'
    ],
];
