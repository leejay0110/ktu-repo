<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Events\NewUserRegistered;
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
            'name' => ['required', 'max:255'],
            'username' => ['required',  'unique:users',  'max:255'],
            'email' => ['required', 'email', 'unique:users', 'max:255'],
            'password' => ['required', 'min:8'],
            'roles' => ['required']
        ]);

        $user = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);


        // set user roles through event & listener
        $roles = $data['roles'];
        event(new NewUserRegistered($user, $roles));


        // notify admin for account activation
        $admin = User::where('username', 'admin')->first();
        $admin->notify(new UserRegistered($user));


        
        return redirect()->route('login.show')->with('success', 'Your accunt has been created but awaitng activation. Please contact the admin.');



    }

}
