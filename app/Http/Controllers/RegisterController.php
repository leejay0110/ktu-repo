<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Notifications\UserRegistered;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }



    function index()
    {
        return view('pages.register');
    }



    function register(Request $request)
    {

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string',  'unique:users',  'max:255'],
            'email' => ['required', 'string', 'email', 'unique:users', 'max:255'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        $user = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);



        $admin = User::where('username', 'admin')->first();
        $admin->notify(new UserRegistered($user));


        
        return redirect()->route('login.show')->with('success', 'Your accunt has been created but awaitng activation. Please contact the admin.');



    }

}
