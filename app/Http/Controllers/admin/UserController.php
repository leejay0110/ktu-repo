<?php

namespace App\Http\Controllers\admin;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.admin');
    }

    function index()
    {

        $users = User::where('admin', 0)->orderBy('active', 'desc')->orderBy('name')->get();

        return view('dashboard.admin.user.index', [
            'users' => $users
        ]);
        
    }


    function show(User $user)
    {

        $roles = Role::all();

        return view('dashboard.admin.user.show', [
            'user' => $user,
            'roles' => $roles
        ]);

    }


    function approve(User $user)
    {

        $user->approved = 1;
        $user->save();

        return redirect()->back()->with('success', 'Account approved successfully.');

    }

    function activate(User $user)
    {

        $user->active = 1;
        $user->save();

        return redirect()->back()->with('success', 'User activated successfully.');

    }

    function deactivate(User $user)
    {

        $user->active = 0;
        $user->save();

        return redirect()->back()->with('success', 'User deactived successfully.');

    }



    function resetPassword(User $user)
    {
        $user->password = Hash::make('pass1234');
        $user->save();
        return redirect()->back()->with('success', 'Password reset was successful. New password = pass1234.');

    }
    

}
