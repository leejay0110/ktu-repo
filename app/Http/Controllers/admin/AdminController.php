<?php

namespace App\Http\Controllers\admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.admin');
    }

    public function index()
    {

        $users = User::where('admin', 0)->get()->count();
        $deactivated = User::where('active', 0)->get()->count();

        

        return view('dashboard.admin.index', [
            'users' => $users,
            'deactivated' => $deactivated
        ]);

    }
    
}
