<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Event;

use App\Events\ChangeRoleEvent;

use App\Models\User;

class UsersController extends Controller
{
    function __construct()
    {
        $this->middleware('admin');
    }

    public function getManage()
    {

        $this->middleware('admin');

        $users=User::paginate(20);
        return view('admin.users.manage', [
          'pageInfo'=>
           [
            'siteTitle'        =>'Manage Users',
            'pageHeading'      =>'Manage Users',
            'pageHeadingSlogan'=>'Here the section to manage all registered users'
            ]
            ,
            'data'=>
            [
               'users'      =>  $users
              ]
          ]);
    }

    public function getRole($user, $role)
    {
        $roles=[
            'admin',
            'author',
            'user'
        ];

        if(in_array($role, $roles)){
            $user=User::findOrFail($user);
            $user->role=strtolower($role);
            if($user->save()){
                Event::fire(new ChangeRoleEvent($user));
                return redirect()->back();
            }

        }

        return 'Someting went wrong';
    }
}
