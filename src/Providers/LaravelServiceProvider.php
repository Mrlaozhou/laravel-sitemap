<?php
namespace Mrlaozhou\Sitemap\Providers;

use Mrlaozhou\Sitemap\Commands\SiteMapBuild;
use Mrlaozhou\Sitemap\Commands\SiteMapPublish;
use Mrlaozhou\Sitemap\ServiceProvider;

class LaravelServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //  加载视图
        $this->loadViewsFrom( $view_path = __DIR__ . '/../../view', 'sitemap' );
        //  合并配置文件
        $this->mergeConfigFrom( $config_path = __DIR__ . '/../../config/sitemap.php', 'sitemap' );
        //  发布配置文件
        $this->publishes( [
            $config_path        =>  config_path('sitemap.php')
        ], 'config' );
        //  发布视图
        $this->publishes( [
            $view_path          =>  base_path('resources/views/vendor/sitemap'),
        ], 'view' );
    }

    public function register()
    {
        if( $this->app->runningInConsole() ) {
            //  注册console
            $this->commands( [
                SiteMapBuild::class,
                SiteMapPublish::class
            ] );
        }
        $this->app->bind('sitemap', function(){
            return new \Mrlaozhou\Sitemap\Sitemap();
        });
    }
}