<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\User;

class ProfileController extends Controller
{
    public function index($id)
    {
        $user= User::findOrFail($id);
        return view('site.users.profile', [
          'pageInfo'=>[
            'pageLogo'=>'profile',
            'siteTitle'=>'Profile : '.$user->name,
            'pageHeading'=>'User Profile',
            'pageHeadingSlogan'=>'Its an users archive'],
            'data'=>$user
          ]);
    }
}
