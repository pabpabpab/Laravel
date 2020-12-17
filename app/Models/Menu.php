<?php


namespace App\Models;


class Menu
{
    private $menu = [
        [
            'title' => 'Home',
            'alias' => 'news::categories',
        ],
        [
            'title' => 'Admin',
            'alias' => 'admin::news::index',
        ],
    ];

    private $adminMenu = [
        [
            'title' => 'Authorization',
            'alias' => 'admin::news::index',
        ],
        [
            'title' => 'Create news',
            'alias' => 'admin::news::create',
        ],
        [
            'title' => 'Main page',
            'alias' => 'news::categories',
        ],
    ];


    public function getMainMenu() {
        return $this->menu;
    }

    public function getAdminMenu() {
        return $this->adminMenu;
    }

}
