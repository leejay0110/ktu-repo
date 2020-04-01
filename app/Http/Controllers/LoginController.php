<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


class LoginController extends Controller
{
    function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }



    function show()
    {
        return view('pages.login');
    }



    function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {

            if (Auth::user()->isAdmin()){
                return redirect()->route('admin.index');
            }
            return redirect()->route('user.index');

        }

        return redirect()->back()->with('error', 'Invalid credentials.');

    }




    function logout()
    {
        Auth::logout();
        return redirect()->back();
    }

}
