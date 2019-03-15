<?php

return [
    /*
    |--------------------------------------------------------------------------
    | -- 配置 --
    |--------------------------------------------------------------------------
    |   -- 描述 --
    |
    */

    'title'             =>  env('APP_NAME', 'Mrlaozhou/laravel-sitemap'),

    /**
     * @var \Mrlaozhou\Sitemap\HandlerContract
     */
    'handler'           =>  \Mrlaozhou\Sitemap\SiteMapHandler::class
];