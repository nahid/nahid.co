<?php

namespace Nahidz\Notify;

use Illuminate\Support\ServiceProvider;

class NotifiyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'notify');
        $this->publishes([
            __DIR__.'/migrations' => base_path('database/migrations'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/routes.php';
        $this->app->make('Nahidz\Notify\Notify');
    }

    public function provides()
    {
        return ['Nahidz\Notify\NotifyServiceProvider'];
    }
}
