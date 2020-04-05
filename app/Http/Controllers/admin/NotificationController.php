<?php

namespace App\Http\Controllers\admin;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    

    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.admin');
    }


    public function index()
    {
        return view('dashboard.admin.notifications');
    }

    public function markAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }

    public function delete()
    {
        Auth::user()->notifications()->delete();
        return redirect()->back();
    }

}
