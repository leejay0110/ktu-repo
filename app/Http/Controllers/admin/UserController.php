<?php

namespace App\Http\Controllers\admin;

use App\User;
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

        return view('dashboard.admin.user.show', [
            'user' => $user
        ]);

    }


    function activate(User $user)
    {

        $user->active = 1;
        $user->save();

        return redirect()->back()->with('success', 'User activated successful.');

    }

    function deactivate(User $user)
    {

        $user->active = 0;
        $user->save();

        return redirect()->back()->with('success', 'User deactived successful.');

    }



    function resetPassword(User $user)
    {
        $user->password = Hash::make('password');
        $user->save();
        return redirect()->back()->with('success', 'Password reset was successful.');

    }



}
