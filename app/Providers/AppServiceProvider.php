<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    
    public function boot()
    {
        \URL::forceScheme('https'); //追加
        $this->app['request']->server->set('HTTPS','on');
        Paginator::useBootstrap();
        
    }
}
