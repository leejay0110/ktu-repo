<?php

namespace App\Http\Controllers\user;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
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


        // delete old avatar
        if ( Auth::user()->avatar ) {
            Storage::delete(Auth::user()->avatar);
        }

        // upload new avatar
        $filename = Auth::user()->username . "." . $request->File('avatar')->getClientOriginalExtension();
        $path = $request->File('avatar')->storeAs("public/avatars", $filename);


        // resize new avatar
        $img = Image::make( public_path( "storage/avatars/$filename") )->fit(300, 300);
        $img->save();

        
        $user = Auth::user();
        $user->avatar = $path;
        $user->save();
        
        return redirect()->back()->with('success', 'Avatar updated successfully.');
        
    }

    function deleteAvatar()
    {
        Storage::delete(Auth::user()->avatar);
        
        $user = Auth::user();
        $user->avatar = null;
        $user->save();

        return redirect()->back()->with('success', 'Avatar deleted successfully.');
    }



    function editPassword()
    {
        return view('dashboard.user.settings.edit-password');
    }



    function updatePassword(Request $request)
    {
        $request->validate([
            'password_old' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);

        if(Hash::check($request->password_old, Auth::user()->password))
        {
            $user = Auth::user();
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->back()->with('success', 'Password updated successfully.');
        }

        return redirect()->back()->with('error', 'The old password incorrect.');
    }

}
