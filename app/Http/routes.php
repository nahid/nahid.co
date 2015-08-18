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

Route::get('/', 'PublicContoller@index');

Route::controllers([
      'diary'   =>    'DiaryController'
  ]);




Route::group(['middleware'=>'admin', 'namespace'=>'Admin', 'prefix'=>'admin'], function(){
    Route::controllers([
        'diary'     =>      'DiaryController'
    ]);

    get('/', function(){
        return view('admin.layouts.master', [
          'pageInfo'=>[
            'siteTitle'=>'Dashboard',
            'pageHeading'=>'Dashboard',
            'pageHeadingSlogan'=>'I write here what I learn']

          ]);
    });
});

Route::get('login','LoginController@loginPage');

Route::get('logout', 'LoginController@logout');

Route::get('login/facebook', 'LoginController@facebookLogin');
Route::get('login/github', 'LoginController@githubLogin');
Route::get('login/google', 'LoginController@googleLogin');
Route::get('login/twitter', 'LoginController@twitterLogin');

Route::get('callback/facebook', 'LoginController@callbackFacebook');
Route::get('callback/github', 'LoginController@callbackGithub');
Route::get('callback/google', 'LoginController@callbackGoogle');
Route::get('callback/twitter', 'LoginController@callbackTwitter');
