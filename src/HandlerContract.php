<?php
namespace Mrlaozhou\Sitemap;

interface HandlerContract
{

    /**
     * @return \Illuminate\Contracts\Support\Arrayable|array
     */
    public function handle ();
}