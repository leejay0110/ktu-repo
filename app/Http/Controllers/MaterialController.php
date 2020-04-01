<?php

namespace App\Http\Controllers;

use App\User;
use App\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{


    public function index()
    {
        $users = User::where('admin', 0)->orderBy('name')->get();
        return view('pages.material.index', ['users' => $users]);
    }



    function search(Request $request)
    {

        request()->validate([
            'query' => 'required'
        ]);
        
        $materials = Material::where('course_title', 'like', '%' . $request['query'] . '%')
            ->orwhere('course_code', 'like', '%' . $request['query'] . '%')
            ->orwhere('lecturer', 'like', '%' . $request['query'] . '%')
            ->limit(10)->get();

        return view('pages.material.search', [
            'materials' => $materials
        ]);

    }


    public function show(Material $material)
    {
        $users = User::where('admin', 0)->orderBy('name')->get();
        return view('pages.material.show', [
            'material' => $material,
            'users' => $users
        ]);
    }

    public function user(User $user)
    {
        $users = User::where('admin', 0)->orderBy('name')->get();
        return view('pages.material.user', [
            'users' => $users,
            'user' => $user,
        ]);
    }


}
