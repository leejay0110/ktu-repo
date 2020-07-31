<?php

namespace App\Http\Controllers\admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    

    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.admin');
    }



    function details()
    {
        return view('dashboard.admin.settings.details');
    }



    function editDetails()
    {
        return view('dashboard.admin.settings.edit-details');
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

        return redirect()->route('admin.settings.details')->with('success', 'Update was successful.');
        
    }




    function editPassword()
    {
        return view('dashboard.admin.settings.edit-password');
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

            return redirect()->back()->with('success', 'Your password has been updated successfully.');
        }

        return redirect()->back()->with('error', 'The old password you provided is incorrect.');
    }


}
