<?php

namespace Nahidz\Tagx;

use Illuminate\Support\ServiceProvider;

class TagxServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/migrations' => base_path('database/migrations'),
            __DIR__.'/Models' => base_path('app/Models'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Nahidz\Tagx\Tagx');
    }

    public function provides()
    {
        return ['Nahidz\Tagx\TagxServiceProvider'];
    }
}
