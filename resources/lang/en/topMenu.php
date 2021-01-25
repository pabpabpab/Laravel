<?php

return [

    'common' => [
        [
            'title' => 'Home',
            'alias' => 'news::categories',
            'auth' => false,
            'role' => '',
        ],
        [
            'title' => 'Admin panel',
            'alias' => 'admin::news::index',
            'auth' => true,
            'role' => 'admin',
        ],
    ],

    'admin' => [
        [
            'title' => 'Main page',
            'alias' => 'news::categories',
            'auth' => false,
            'role' => '',
        ],
        [
            'title' => 'News admin',
            'alias' => 'admin::news::index',
            'auth' => true,
            'role' => 'admin',

        ],
        [
            'title' => 'Create news',
            'alias' => 'admin::news::create',
            'auth' => true,
            'role' => 'admin',
        ],
        [
            'title' => 'Xml',
            'alias' => 'admin::parser::index',
            'auth' => true,
            'role' => 'admin',
        ],
    ],


    'login' => [
        'title' => 'Log in',
        'alias' => 'login',
    ],

    'loginVk' => [
        'title' => 'LoginVk',
        'alias' => 'social::login',
    ],
    'loginYandex' => [
        'title' => 'LoginYandex',
        'alias' => 'social::login',
    ],

    'register' => [
        'title' => 'Register',
        'alias' => 'register',
    ],


    'myprofile' => [
        'title' => 'My profile',
        'alias' => 'admin::users::myprofile',
    ],


    'logout' => [
        'title' => 'Log out',
        'alias' => 'logout',
    ],

];
