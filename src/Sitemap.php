<?php
namespace Mrlaozhou\Sitemap;

use Illuminate\Support\Facades\File;
use Mrlaozhou\Extend\Collection;

class Sitemap
{

    /**
     * @param string $filename
     * @param string $view
     *
     * @return int
     */
    public function store($filename = 'sitemap.html', $view = 'html')
    {
        return File::put( public_path($filename), $this->render($view) );
    }

    /**
     * @param string $view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function render($view = 'html')
    {
        return view( 'sitemap::'.$view, [
            'collection'        =>  $this->collect()
        ] );
    }

    /**
     * @return array|\Illuminate\Contracts\Support\Arrayable
     */
    public function collect()
    {
        if( class_exists( $handler = config('sitemap.handler') ) && ( ($handler = new $handler()) instanceof HandlerContract ) ) {
            //  获取数据
            /* @var \Mrlaozhou\Extend\Collection $collection */
            $collection           =   ( new $handler() )->handle();
            return $collection;
        }
        return [];
    }
}