<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Diary;
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
        $this->sidebarCategory();
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


    protected function sidebarCategory(){
        view()->composer('site.partials.sidebar', function($view){
            $view->with('navData', ['category'=>Category::get(), 'recents'=>Diary::take(5)->get(['title', 'id'])]);
        });
    }

    protected function adminHeader(){
        view()->composer('admin.partials.header', function($view){
            $view->with('headerData', ['notifications'=>Notifications::where('user_id', Auth::user()->id)->get()]);
        });
    }

}
