<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('pages.about.index');
    }

    public function developers()
    {
        return view('pages.about.developers');
    }
}
