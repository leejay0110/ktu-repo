<?php

namespace App\Http\Controllers\user;

use Auth;
use App\Material;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    

    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.user');
        $this->middleware('check.active.status');
    }



    function index()
    {
        return view('dashboard.user.material.index');
    }

    function create()
    {
        return view('dashboard.user.material.create');
    }


    function store(Request $request)
    {
        
        $credentials = $request->validate([
            'course_title' => 'required',
            'course_code' => 'required|max:20',
            'lecturer' => 'required',
            'files' => 'sometimes'
        ]);
        
        $credentials['folder'] = "materials/" . uniqid('cm_');
        $material = Auth::User()->materials()->create($credentials);


        if ($request->hasFile('files')) {

            foreach ($request->file('files') as $file) {

                $filename = Str::random(40) . ".{$file->getClientOriginalExtension()}";
                $path = $file->storeAs("public/{$material->folder}", $filename);

                $material->files()->create([
                    'filename' => $file->getClientOriginalName(),
                    'path' => $path
                ]);

            }
            
        }

        return redirect()->route('user.materials.show', $material)->with('success', 'Material successfully created.');
        
    }

    function show(Material $material)
    {
        $this->authorize('view', $material);
        return view('dashboard.user.material.show', ['material' => $material]);
    }

    

    function edit(Material $material)
    {
        $this->authorize('edit', $material);
        return view('dashboard.user.material.edit', ['material' => $material]);
    }


    function update(Request $request, Material $material)
    {
        $this->authorize('update', $material);

        $data = $request->validate([
            'course_title' => 'required',
            'course_code' => 'required|max:20',
            'lecturer' => 'required'
        ]);
        
        $material->course_title = $data['course_title'];
        $material->course_code = $data['course_code'];
        $material->lecturer = $data['lecturer'];
        $material->save();

        return redirect()->route('user.materials.show', $material)->with('success', 'Course material updated successfully.');
        
    }


    public function destroy(Material $material)
    {
        $this->authorize('delete', $material);

        $material->delete();
        Storage::deleteDirectory('public/' . $material->folder);
        
        return redirect()->route('user.materials')->with('success', 'Course material successfully deleted.');

    }

}
