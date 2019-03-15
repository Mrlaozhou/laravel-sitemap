<?php
namespace Mrlaozhou\Sitemap;

class SiteMapHandler implements HandlerContract
{
    public function handle()
    {
        return [
            ['title' => '我爱老周', 'url' => 'http://blog.52laozhou.com']
        ];
    }
}