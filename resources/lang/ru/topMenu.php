<?php

return [

    'common' => [
        [
            'title' => 'Главная',
            'alias' => 'news::categories',
            'auth' => false,
            'role' => '',
        ],
        [
            'title' => 'Админ-панель',
            'alias' => 'admin::news::index',
            'auth' => true,
            'role' => 'admin',
        ],
    ],

    'admin' => [
        [
            'title' => 'На сайт',
            'alias' => 'news::categories',
            'auth' => false,
            'role' => '',
        ],
        [
            'title' => 'Админка новостей',
            'alias' => 'admin::news::index',
            'auth' => true,
            'role' => 'admin',
        ],
        [
            'title' => 'Добавить новость',
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
        'title' => 'Войти',
        'alias' => 'login',
    ],

    'loginVk' => [
        'title' => 'Войти Vk',
        'alias' => 'social::login',
    ],
    'loginYandex' => [
        'title' => 'Войти Yandex',
        'alias' => 'social::login',
    ],

    'register' => [
        'title' => 'Регистрация',
        'alias' => 'register',
    ],

    'myprofile' => [
        'title' => 'Мой профиль',
        'alias' => 'admin::users::myprofile',
    ],

    'logout' => [
        'title' => 'Выйти',
        'alias' => 'logout',
    ],

];
