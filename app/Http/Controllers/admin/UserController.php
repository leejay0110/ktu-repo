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
        $deactivated = User::where('admin', 0)->where('active', 0)->orderBy('name')->get();

        return view('dashboard.admin.user.index', [
            'users' => $users,
            'deactivated' => $deactivated
        ]);
        
    }


    function show(User $user)
    {

        return view('dashboard.admin.user.show', [
            'user' => $user
        ]);

    }


    function toggleStatus(User $user)
    {

        $user->active = $user->isActive() ? 0 : 1;
        $user->save();

        return redirect()->back()->with('success', 'Active status updated successful.');

    }

    function resetPassword(User $user)
    {
        $user->password = Hash::make('password');
        $user->save();
        return redirect()->back()->with('success', 'Password reset was successful.');

    }



}
