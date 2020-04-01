<?php

namespace App\Http\Controllers;

use App\File;
use App\Paper;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    // public function open(Paper $paper)
    // {
    //     $mimeType =  Storage::mimeType($paper->path);
    //     return response()->file( storage_path('app/' . $paper->path) , [ 'Content-Type' => $mimeType ]);

    // }

    public function downloadPaper(Paper $paper)
    {
        return Storage::download( $paper->path, $paper->filename , [ 'Content-Type' => Storage::mimeType($paper->path)]);
    }

    public function downloadMaterial(File $file)
    {
        return Storage::download( $file->path, $file->filename , [ 'Content-Type' => Storage::mimeType($file->path)]);
    }
}
