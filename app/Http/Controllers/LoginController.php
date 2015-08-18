<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\User;

use Auth;
use Response;
use Socialite;
use Hash;

class LoginController extends Controller
{

    public function loginPage(){
        return view('site.login', [
          'pageInfo'=>['pageLogo'=>'diary','siteTitle'=>'Login', 'pageHeading'=>'User Login', 'pageHeadingSlogan'=>'Here the place to authentication']
         ]);
    }
   protected function login($instance){
      $user=User::where('email', $instance->getEmail());

      if($user->exists()){
          $user=$user->first();
          if(Auth::loginUsingId($user->id)){
            return true;
          }

      }else{
        $pwd=explode('@', $instance->getEmail());
        $pwd=Hash::make($pwd[0].uniqid());
        $newUser=new User;
        $newUser->name=$instance->getName();
        $newUser->email=$instance->getEmail();
        $newUser->image=$instance->getAvatar();
        $newUser->password=$pwd;
        $newUser->status=0;
        $newUser->role='user';

        if($newUser->save()){
          if(Auth::loginUsingId($newUser->id)){
            return true;
          }
        }


      }
   }

   public function logout(){
     Auth::logout();
     return redirect('login');
   }

   public function facebookLogin(){
      return Socialite::driver('facebook')->redirect();
   }
   public function githubLogin(){
      return Socialite::driver('github')->redirect();
   }
   public function googleLogin(){
      return Socialite::driver('google')->redirect();
   }
   public function twitterLogin(){
      return Socialite::driver('twitter')->redirect();
   }



   public function callbackFacebook(){
     $user=Socialite::driver('facebook')->user();
     if($this->login($user)){
       return redirect('/');
     }
   }

   public function callbackGithub(){
     $user=Socialite::driver('github')->user();
     if($this->login($user)){
       return redirect('/');
     }
   }

   public function callbackGoogle(){
     $user=Socialite::driver('google')->user();
     if($this->login($user)){
       return redirect('/');
     }
   }

   public function callbackTwitter(){
     $user=Socialite::driver('twitter')->user();
     if($this->login($user)){
       return redirect('/');
     }
   }
}
