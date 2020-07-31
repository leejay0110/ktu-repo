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

        $approved = User::findOrFail($notification->data['id'])->isApproved();

        $user = User::findOrFail( $notification->data['id'] );
        

        return view('dashboard.admin.notifications.show', [
            'notification' => $notification,
            'approved' => $approved,
            'user' => $user
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
