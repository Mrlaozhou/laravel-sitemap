<?php
namespace Mrlaozhou\Sitemap;

use Illuminate\Support\Facades\File;
use Mrlaozhou\Extend\Collection;

class Sitemap
{

    /**
     * @param $config
     *
     * @return bool|int
     */
    public function store($config)
    {
        return File::put( public_path($config['filename']), $this->render($config,'html') );
    }

    /**
     * @param $config array
     * @param string $view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function render($config, $view = 'html')
    {
        return view( 'sitemap::'.$view, [
            'collection'        =>  $this->collect($config['handler']),
            'title'             =>  $config['title'] ?? '',
        ] );
    }

    /**
     * @param $handler string
     *
     * @return array|\Illuminate\Contracts\Support\Arrayable
     */
    public function collect($handler)
    {
        if( class_exists( $handler ) && ( ($handlerInstance = new $handler) instanceof HandlerContract ) ) {
            //  获取数据
            /**
             * @var \Mrlaozhou\Extend\Collection $collection
             * @var \Mrlaozhou\Sitemap\HandlerContract $handlerInstance
             */
            $collection           =   $handlerInstance->handle();
            return $collection;
        }
        return [];
    }
}