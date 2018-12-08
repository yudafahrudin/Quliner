<?php

/*
  |--------------------------------------------------------------------------
  | Array for admin navigation
  |--------------------------------------------------------------------------
  |
  | This array for make automaticaly navigation list in backend
  |
 */
return [
    'navigation' => [
        'user' => [
            'name' => 'User',
            'icon' => 'fa-user',
            'subnav' => [
                'addUser' => [
                    'name' => 'Tambah User ',
                    'icon' => '',
                    'url' => 'admin/users/add',
                ],
                'listUser' => [
                    'name' => 'Daftar User',
                    'icon' => '',
                    'url' => 'admin/users',
                ],
            ],
        ],
        'category' => [
            'name' => 'Kategori',
            'icon' => 'fa-tag',
            'subnav' => [
                'addUser' => [
                    'name' => 'Tambah Kategori',
                    'icon' => '',
                    'url' => 'admin/categories/add',
                ],
                'listUser' => [
                    'name' => 'Daftar Kategori',
                    'icon' => '',
                    'url' => 'admin/categories',
                ],
            ],
        ],
        'homefood' => [
            'name' => 'Rumah Makan',
            'icon' => 'fa-home',
            'subnav' => [
                'addUser' => [
                    'name' => 'Tambah Rumah Makan',
                    'icon' => '',
                    'url' => 'admin/foodhomes/add',
                ],
                'listUser' => [
                    'name' => 'Daftar Rumah Makan',
                    'icon' => '',
                    'url' => 'admin/foodhomes',
                ],
            ],
        ],
    ],
];
