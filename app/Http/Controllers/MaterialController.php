<?php

namespace App\Http\Controllers;

use App\User;
use App\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{


    public function index()
    {
        $materials = Material::latest()->limit(3)->get();
        return view('pages.material.index', [
            'materials' => $materials
        ]);
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
        return view('pages.material.show', [
            'material' => $material
        ]);
    }

    public function user(User $user)
    {
        
        if ( $user->roles->pluck('name')->contains('cm upload') ) {
            return view('pages.material.user', [
                'user' => $user
            ]);
        }
        abort(404);

    }

}