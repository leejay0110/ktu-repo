<?php

namespace App\Http\Controllers\user;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.user');
        $this->middleware('check.active.status');
    }



    function index()
    {
        return view('dashboard.user.settings.index');
    }



    function editDetails()
    {
        return view('dashboard.user.settings.edit-details');
    }



    function updateDetails(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . Auth::user()->id,
        ]);
        
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('user.settings')->with('success', 'Details updated successfully.');
        
    }


    function editAvatar()
    {
        return view('dashboard.user.settings.edit-avatar');
    }

    function updateAvatar(Request $request)
    {

        $request->validate([
            'avatar' => 'file|image|required'
        ]);

        $filename = Auth::user()->username . "." . $request->File('avatar')->getClientOriginalExtension();
        $path = $request->File('avatar')->storeAs("public/avatars", $filename);
        
        $user = Auth::user();
        $user->avatar = $path;
        $user->save();
        
        return redirect()->route('user.settings')->with('success', 'Image updated successfully.');
        
    }

    function deleteAvatar()
    {
        Storage::delete(Auth::user()->avatar);
        
        $user = Auth::user();
        $user->avatar = null;
        $user->save();

        return redirect()->route('user.settings')->with('success', 'Image deleted successfully.');
    }



    function editPassword()
    {
        return view('dashboard.user.settings.edit-password');
    }



    function updatePassword(Request $request)
    {
        $request->validate([
            'password_old' => 'required',
            'password_new' => 'required|min:3'
        ]);

        if(Hash::check($request->password_old, Auth::user()->password))
        {
            $user = Auth::user();
            $user->password = Hash::make($request->password_new);
            $user->save();

            Auth::logout();
            return redirect()->route('login.show')->with('success', 'Password updated successfully. Please login again.');
        }

        return redirect()->back()->with('error', 'The old password incorrect.');
    }

}
