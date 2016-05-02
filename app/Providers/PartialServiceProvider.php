<?php

namespace App\Providers;

use Cache;

use DB;
use App\Models\Category;
use App\Models\Diary;
use App\Models\Messages;
use App\Models\Tags;
use App\Models\Tagged;
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
        if(!Cache::has('_tags')){
            $tags=Tagged::join('tags', 'tagged.tag_id','=', 'tags.id')->select('tags.id', DB::raw('count(tag_id) as total_tags'), 'tags.tag_name')->groupBy('tagged.tag_id')->take(20)->get();
            Cache::put('_tags', $tags, 60);
        }

        if(!Cache::has('_category')){
            $category=Category::get();
            Cache::put('_category', $category, 60);
        }

        if(!Cache::has('_recent')){
            $recent=Diary::where('status', 1)->orderBy('created_at','desc')->take(5)->get(['title', 'id']);
            Cache::put('_recent', $recent, 60);
        }
        if(!Cache::has('_popular')){
            $recent=Diary::where('status', 1)->orderBy('visits','desc')->take(5)->get(['title', 'id']);
            Cache::put('_popular', $recent, 60);
        }
            view()->composer('site.partials.sidebar', function($view){
                $view->with('navData', [
                    'category'=>Cache::get('_category'),
                    'recents'=>Cache::get('_recent'),
                    'tags'=>Cache::get('_tags'),
                    'populars' => Cache::get('_popular')
                    ]);
            });

    }

    protected function adminHeader(){
            view()->composer('admin.partials.header', function($view){
                $view->with('headerData', ['notifications'=>Notifications::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get(), 'messages'=>Messages::where('status', 0)->orderBy('created_at', 'desc')->get()]);
            });
    }

}
