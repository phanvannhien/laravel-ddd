<?php

namespace Fractal\Share\Provider;

use Illuminate\Support\ServiceProvider;
use Fractal\Share\Infrastructure\Serializer;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
     
        $this->app->singleton('serializer',function(){
            return new Serializer();
        });

    }
}
