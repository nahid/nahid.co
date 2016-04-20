<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Models\User;
use App\Models\Tags;
use App\Models\Tagged;
use App\Models\Diary;
use Nahidz\Tagx\Tagx;

//use Auth;

Route::get('/', 'PublicContoller@index');
Route::get('/resume', 'PublicContoller@resumePage');
Route::get('/profile', 'PublicContoller@profilePage');
Route::get('/contact', 'PublicContoller@contactPage');
Route::post('/message', 'PublicContoller@makeContactRequest');


Route::controllers([
    'diary' => 'DiaryController'
]);

Route::get('profile/{id}', 'ProfileController@index');


Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::controllers([
        'diary' => 'DiaryController',
        'resume' => 'WorkEduController',
        'users' => 'UsersController',
        'inbox' => 'InboxController'
    ]);

    get('/', function () {
        return view('admin.layouts.master', [
            'pageInfo' => [
                'siteTitle' => 'Dashboard',
                'pageHeading' => 'Dashboard',
                'pageHeadingSlogan' => 'I write here what I learn']
        ]);
    });
});

Route::get('login', 'LoginController@loginPage');

Route::get('logout', 'LoginController@logout');

Route::get('login/facebook', 'LoginController@facebookLogin');
Route::get('login/github', 'LoginController@githubLogin');
Route::get('login/google', 'LoginController@googleLogin');
Route::get('login/twitter', 'LoginController@twitterLogin');

Route::get('callback/facebook', 'LoginController@callbackFacebook');
Route::get('callback/github', 'LoginController@callbackGithub');
Route::get('callback/google', 'LoginController@callbackGoogle');
Route::get('callback/twitter', 'LoginController@callbackTwitter');


get('/tags', function (Tagx $tag) {
    $a = explode(',', '');
    dd($a);


});

/*
get('login/proxy', function(){
    if(Auth::loginUsingId(1)){
        return redirect('/');
    }
});
*/
