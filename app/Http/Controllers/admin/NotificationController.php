<?php

namespace App\Http\Controllers\admin;

use Auth;
use App\User;
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
        return view('dashboard.admin.notifications.index');
    }

    
    public function show($notification)
    {
        $notification = Auth::user()->notifications->find($notification);

        if (! $notification->read_at) {
            $notification->markAsRead();
        }

        $active = User::findOrFail($notification->data['id'])->isActive();
        
        return view('dashboard.admin.notifications.show', [
            'notification' => $notification,
            'active' => $active
        ]);
    }
    

    public function markAllAsRead()
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
