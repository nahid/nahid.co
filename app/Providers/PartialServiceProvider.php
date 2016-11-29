<?php

namespace App\Providers;

use App\Models\Messages;
use App\Models\Notifications;
use Illuminate\Support\ServiceProvider;

use Auth;

class PartialServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

            $this->adminHeader();

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }


    protected function adminHeader(){
            view()->composer('admin.partials.header', function($view){
                $view->with('headerData', ['notifications'=>Notifications::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get(), 'messages'=>Messages::where('status', 0)->orderBy('created_at', 'desc')->get()]);
            });
    }

}
