<?php
return [

    '(account/registration)' => [
        'controller' => 'user',
        'action' => 'registration'
    ],
    '' =>[
        'controller' => controllers\main::class,
        'action'     => 'index'
    ],
    '(\d*)' =>[
        'controller' => 'main',
        'action'     => 'index'
    ],
    '(/footer)' =>[
        'controller' => 'main',
        'action'     => 'footer'
    ],
    '(category)/(\w+)' =>[
        'controller' => 'main',
        'action'     => 'category'
    ],
    '(tag)/(\w+)' =>[
        'controller' => 'main',
        'action'     => 'tag'
    ],
    '(single)/(\d+)' =>[
        'controller' => 'main',
        'action'     => 'singlePost'
    ],


            //admin/categories

    '(admin/categories)' =>[
        'controller' => 'category',
        'action'    => 'display',
        'middleware' => 'auth'
    ],
    '(admin/category/add)' =>[
        'controller' => 'category',
        'action'    => 'add',
        'middleware' => 'auth'
    ],
    '(admin/category/edit)/(\d+)' =>[
        'controller' => 'category',
        'action'    => 'edit',
        'middleware' => 'auth'
    ],
    '(admin/category/delete)/(\d+)' =>[
        'controller' => 'category',
        'action'    => 'delete',
        'middleware' => 'auth'

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
        'controller' => 'tag',
        'action'    => 'display',
        'middleware' => 'auth'
    ],
    '(admin/tag/add)' =>[
        'controller' => 'tag',
        'action'    => 'add',
        'middleware' => 'auth'
    ],
    '(admin/tag/edit)/(\d+)' =>[
        'controller' => 'tag',
        'action'    => 'edit',
        'middleware' => 'auth'
    ],
    '(admin/tag/delete)/(\d+)' =>[
        'controller' => 'tag',
        'action'    => 'delete',
        'middleware' => 'auth'
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
