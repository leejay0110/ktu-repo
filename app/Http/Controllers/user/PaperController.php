<?php

namespace App\Http\Controllers\user;

use Auth;
use App\Paper;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PaperController extends Controller
{



    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.user');
        $this->middleware('check.approval');
        $this->middleware('check.active.status');
        $this->middleware('pep.upload');
    }



    function index()
    {
        return view('dashboard.user.paper.index');
    }



    function create()
    {
        return view('dashboard.user.paper.create');
    }



    function store(Request $request)
    {
        $credentials = $request->validate([
            'course_title' => 'required',
            'course_code'  => 'required',
            'examiner'     => 'required',
            'year'         => 'required',
            'semester'     => 'required',
        ]);

        $request->validate([
            'paper' => 'required|file|mimes:pdf'
        ], [
            'paper.required' => 'Please select a file to upload',
            'paper.mimes' => 'The file must be of type: pdf.'
        ]);
        
        
        if ($request->hasFile('paper')) {

            $filename = Str::random(40) . ".{$request->paper->getClientOriginalExtension()}";
            $path = $request->paper->storeAs("public/papers", $filename);

            $credentials['filename'] = $request->paper->getClientOriginalName();
            $credentials['path'] =$path;

            Auth::user()->papers()->create($credentials);

            return redirect()->route('user.papers')->with('success', 'Past exam paper added successfully.');
        
        }
    }

    

    function show(Paper $paper)
    {
        $this->authorize('view', $paper);
        return view('dashboard.user.paper.show', ['paper' => $paper]);
    }



    function edit(Paper $paper)
    {
        $this->authorize('edit', $paper);
        return view('dashboard.user.paper.edit', ['paper' => $paper]);
    }



    function update(Request $request, Paper $paper)
    {

        $this->authorize('update', $paper);

        $data = $request->validate([
            'course_title' => 'required',
            'course_code'  => 'required',
            'examiner'     => 'required',
            'year'         => 'required',
            'semester'     => 'required'
        ]);
        
        $paper->course_title = $data['course_title'];
        $paper->course_code = $data['course_code'];
        $paper->examiner = $data['examiner'];
        $paper->year = $data['year'];
        $paper->semester = $data['semester'];
        $paper->save();

        return redirect()->route('user.papers.show', $paper)->with('success', 'Past exam paper updated successfully.');
        
    }


    function destroy(Paper $paper)
    {

        $this->authorize('delete', $paper);

        Storage::delete($paper->path);
        $paper->delete();

        return redirect()->route('user.papers', )->with('success', 'Past exam paper deleted successfully.');
        
    }




}
