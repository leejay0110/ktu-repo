<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use App\Mail\PasswordReset;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Mail;

class PasswordResetController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function showLinkRequestForm()
    {
        return view('password.request');
    }







    public function sendResetLinkEmail()
    {
        request()->validate([
            'email' => 'required|email|exists:users,email' ] , [
            'email.exists' => "We can't find a user with that email address."
        ]);

        $token = Str::random(60);{

        DB::table('password_resets')->insert([
            'email' => request('email'),
            'token' => $token,
            'created_at' => now()
        ]);

        $url = route('password.reset', $token, request('email'));


        // dd($url);

        Mail::to(request('email'))
            ->send(new PasswordReset($url));}



        return redirect()->back()->with('success', 'A password reset link has been sent to your email, please check it out.');

    }




    public function reset($token)
    {

        $user = DB::table('password_resets')->select('email')->where('token', $token)->first();
        
        if (! $user) {
            return redirect()->route('password.request')->with('error', 'The password reset token is invalid.');
        }


        $user = User::where('email', $user->email)->firstOrFail();
        $user->password = Hash::make('pass1234');
        $user->save();

        DB::table('password_resets')->where('token', request('token'))->delete();


        return redirect('login')->with('success', 'Password reset successful. Please login');

    }



}
