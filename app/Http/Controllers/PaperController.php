<?php

namespace App\Http\Controllers;

use App\Paper;
use Illuminate\Http\Request;

class PaperController extends Controller
{

    public function index()
    {
        // Recently Uploaded Papers
        $papers = Paper::latest()->limit(3)->get();

        return view('pages.paper.index', [
            'papers' => $papers
        ]);
    }


    function search(Request $request)
    {

        request()->validate([
            'query' => 'required'
        ]);
        
        $papers = Paper::where('course_title', 'like', '%' . $request['query'] . '%')
            ->orwhere('course_code', 'like', '%' . $request['query'] . '%')
            ->orwhere('examiner', 'like', '%' . $request['query'] . '%')
            ->limit(10)->get();

        return view('pages.paper.search', [
            'papers' => $papers
        ]);

    }
    
}
