<?php

return [
    '' =>[
        'controller' => controllers\MainController::class,
        'action'     => 'index',
        'method'     => 'get'
    ],
    '(single)/(\d+)' =>[
        'controller' => controllers\MainController::class,
        'action'     => 'singlePost',
        'method'     => 'get'
    ],
    '/qwe' =>[
        'controller' => controllers\MainController::class,
        'action'     => 'index',
        'method'     => 'get'
    ],
    '(category)/(\w+)' =>[
        'controller' => controllers\MainController::class,
        'action'     => 'category',
        'method'     => 'get'
    ],
    '(tag)/(\w+)' =>[
        'controller' => controllers\MainController::class,
        'action'     => 'tag',
        'method'     => 'get'
    ],



            //admin/categories

    '(admin/categories)' =>[
        'controller' => controllers\CategoryController::class,
        'action'    => 'display',
//        'middleware' => 'auth'
    ],
    '(admin/category/add)' =>[
        'controller' => controllers\CategoryController::class,
        'action'    => 'add',
//        'middleware' => 'auth'
    ],
    '(admin/category/edit)/(\d+)' =>[
        'controller' => controllers\CategoryController::class,
        'action'    => 'edit',
    ],
    '(admin/category/delete)/(\d+)' =>[
        'controller' => controllers\CategoryController::class,
        'action'    => 'delete',

    ],'(admin/category/ajax)/(\d+)' =>[
        'controller' => 'category',
        'action'    => 'getCategoryStatus',
        'middleware' => 'auth'
    ],
    'tester' =>[
        'controller' => 'post',
        'action'    => 'test',
        'middleware' => 'auth'
    ],


            //admin/posts

    '(admin/posts)' =>[
        'controller' => controllers\PostController::class,
        'action'    => 'display',
        'method'    => 'get'
    ],
    '(admin/posts)/(\d*)' =>[
        'controller' => 'post',
        'action'    => 'display',
        'middleware' => 'auth'
    ],
    '(admin/posts/add)' =>[
        'controller' => controllers\PostController::class,
        'action'    => 'add',
        'method'    => 'get'
    ],
    '(admin/posts/edit)/(\d+)' =>[
        'controller' => controllers\PostController::class,
        'action'    => 'edit',
        'method'    => 'get'
    ],
    '(admin/posts/delete)/(\d+)' =>[
        'controller' => controllers\PostController::class,
        'action'    => 'delete',
    ],

           //admin/tags

    '(admin/tags)' =>[
        'controller' => controllers\TagController::class,
        'action'     => 'display',
        'method'     => 'get'
    ],
    '(admin/tag/add)' =>[
        'controller' => controllers\TagController::class,
        'action'    => 'add',
        'method'     => 'get'
    ],
    '(admin/tag/edit)/(\d+)' =>[
        'controller' => controllers\TagController::class,
        'action'    => 'edit',
        'method'     => 'get'
    ],
    '(admin/tag/delete)/(\d+)' =>[
        'controller' => controllers\TagController::class,
        'action'    => 'delete',
        'method'     => 'get'
    ],
    '(admin/tag/ajax)/(\d+)' =>[
        'controller' => 'tag',
        'action'    => 'getTagsStatus',
        'middleware' => 'auth'
    ],

           //admin/users

    '(admin/users)' =>[
        'controller' =>  controllers\UserController::class,
        'action'    => 'display',

    ],
    '(admin/user/add)' =>[
        'controller' => controllers\UserController::class,
        'action'    => 'add',
    ],
    '(admin/user/edit)/(\d+)' =>[
        'controller' => controllers\UserController::class,
        'action'    => 'edit',
    ],
    '(admin/user/delete)/(\d+)' =>[
        'controller' => controllers\UserController::class,
        'action'    => 'delete',
    ],
    'admin'=>[
        'controller' => controllers\UserController::class,
        'action'     => 'defaultPage',
    ],
    'admin/logout' =>[
        'controller' => controllers\Auth::class,
        'action'     => 'logout',

    ],
    'account/login' =>[
        'controller' => controllers\Auth::class,
        'action'     => 'login',

    ]

];
