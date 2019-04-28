<?php

namespace Mrlaozhou\Sitemap\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Mrlaozhou\Sitemap\Exceptions\SitemapException;
use Mrlaozhou\Sitemap\HandlerContract;

class SiteMapBuild extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:build {keywords}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '创建网站sitemap.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @throws \Exception
     */
    public function handle()
    {
        $config             =   $this->foundBuildConfigByKeywords(
            $keywords = $this->getKeywordsInput()
        );
        if( ! $config ) {
            throw new SitemapException("[$keywords]配置出错");
        }
        app('sitemap')->store($config);
        $this->info('SiteMap: 更新于 ' . now('PRC')->toDayDateTimeString());
    }

    /**
     * @param $keywords
     * @return array
     */
    protected function foundBuildConfigByKeywords($keywords)
    {
        return config('sitemap.keywords.' . $keywords, []);
    }

    /**
     * @return string
     */
    protected function getKeywordsInput()
    {
        return trim($this->argument('keywords'));
    }
}
