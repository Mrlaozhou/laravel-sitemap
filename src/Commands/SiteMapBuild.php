<?php

namespace Mrlaozhou\Sitemap\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Mrlaozhou\Sitemap\HandlerContract;

class SiteMapBuild extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:build';

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
        app('sitemap')->store();
        $this->info('SiteMap: 更新于 ' . now('PRC')->toDayDateTimeString());
    }
}
