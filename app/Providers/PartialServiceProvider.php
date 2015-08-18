<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Diary;
use Illuminate\Support\ServiceProvider;

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

}
