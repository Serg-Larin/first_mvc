<?php

use controllers\MainController;

return [

    '(account/registration)' => [
        'controller' => 'user',
        'action' => 'registration'
    ],
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
        'controller' => 'post',
        'action'    => 'display',
        'middleware' => 'auth'
    ],
    '(admin/posts)/(\d*)' =>[
        'controller' => 'post',
        'action'    => 'display',
        'middleware' => 'auth'
    ],
    '(admin/posts/add)' =>[
        'controller' => 'post',
        'action'    => 'add',
        'middleware' => 'auth'
    ],
    '(admin/posts/edit)/(\d+)' =>[
        'controller' => 'post',
        'action'    => 'edit',
        'middleware' => 'auth'
    ],
    '(admin/posts/delete)/(\d+)' =>[
        'controller' => 'post',
        'action'    => 'delete',
        'middleware' => 'auth'
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
        'controller' => 'user',
        'action'    => 'display',
        'middleware' => 'auth'
    ],
    '(admin/user/add)' =>[
        'controller' => 'user',
        'action'    => 'add',
        'middleware' => 'auth'
    ],
    '(admin/user/edit)/(\d+)' =>[
        'controller' => 'user',
        'action'    => 'edit',
        'middleware' => 'auth'
    ],
    '(admin/user/delete)/(\d+)' =>[
        'controller' => 'user',
        'action'    => 'delete',
        'middleware' => 'auth'
    ],
    'admin'=>[
        'controller' => 'user',
        'action'     => 'defaultPage',
        'middleware' => 'auth'
    ],
    'admin/logout' =>[
        'controller' => 'user',
        'action'     => 'logout',
        'middleware' => 'auth'
    ],
    'account/authorization' =>[
        'controller' => 'user',
        'action'     => 'authorization',
        'middleware' => 'onAuth'
    ]

];
