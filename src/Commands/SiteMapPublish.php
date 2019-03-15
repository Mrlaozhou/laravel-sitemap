<?php

namespace Mrlaozhou\Sitemap\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Mrlaozhou\Sitemap\HandlerContract;
use Mrlaozhou\Sitemap\Providers\LaravelServiceProvider;

class SiteMapPublish extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '发布sitemap到laravel.';

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
        $this->call('vendor:publish', [
            '--provider' => LaravelServiceProvider::class,
            '--force' => '',
            '--tag' => ['config', 'view'],
        ]);
    }
}
