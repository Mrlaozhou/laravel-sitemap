<?php

return [
    /*
    |--------------------------------------------------------------------------
    | -- 配置 --
    |--------------------------------------------------------------------------
    |   -- 描述 --
    |
    */

    'keywords'          =>  [
        //  手机端
        'mobile'                =>  [
            'title'         =>  '手机端',
            'handler'       =>  \Mrlaozhou\Sitemap\SiteMapHandler::class,
            'filename'      =>  'mobile.html',
            'type'          =>  'html'
        ],

        //  PC端
        'computer'              =>  [
            'title'         =>  'PC端',
            'handler'       =>  \Mrlaozhou\Sitemap\SiteMapHandler::class,
            'filename'      =>  'computer.html',
            'type'          =>  'html'
        ],
    ]
];