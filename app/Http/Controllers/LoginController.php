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

    public function loginPage(Request $req){
        if($req->has('next')){
            session(['_next'=>$req->input('next')]);
        }
        return view('site.login', [
          'pageInfo'=>['pageLogo'=>'diary','siteTitle'=>'Login', 'pageHeading'=>'User Login', 'pageHeadingSlogan'=>'Here the place to authentication']
         ]);
    }
   protected function login($instance){
      $user=User::where('email', $instance->getEmail());

      if($user->exists()){
          $user=$user->first();
          $updateUser=User::where('id', $user->id)->update(['image'=>$instance->getAvatar()]);
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



   public function callbackFacebook(Request $req){
     $user=Socialite::driver('facebook')->user();
     if($this->login($user)){
         if(session('_next')){
             $next=session('_next');
             $req->session()->forget('_next');
             return redirect()->away(rawurldecode($next));
         }
       return redirect('/');
     }
   }

   public function callbackGithub(Request $req){
     $user=Socialite::driver('github')->user();
     if($this->login($user)){
         if(session('_next')){
             $next=session('_next');
             $req->session()->forget('_next');
             return redirect()->away(rawurldecode($next));
         }
       return redirect('/');
     }
   }

   public function callbackGoogle(Request $req){
     $user=Socialite::driver('google')->user();
     if($this->login($user)){
         if(session('_next')){
             $next=session('_next');
             $req->session()->forget('_next');
             return redirect()->away(rawurldecode($next));
         }
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
