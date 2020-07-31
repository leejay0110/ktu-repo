<?php

namespace App\Http\Controllers;

use App\File;
use App\Paper;
use ZipArchive;
use App\Material;
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
        return Storage::download( $paper->path, $paper->filename , [ 'Content-Type' => Storage::mimeType($paper->path)] );
    }

    public function downloadMaterial(File $file)
    {
        return Storage::download( $file->path, $file->filename , [ 'Content-Type' => Storage::mimeType($file->path)] );
    }

    public function downloadAll(Material $material)
    {
        
        $zip = new ZipArchive();
        $tmp_file = tempnam(sys_get_temp_dir() , env('APP_NAME'));
        $zip->open($tmp_file, ZipArchive::CREATE);

        foreach ( $material->files as $file )
        {          
            $download_file = file_get_contents( storage_path('app/' . $file->path) );
            $zip->addFromString( $file->filename , $download_file );
        }

        $zip->close();
        return response()->download(
            $tmp_file,
            "{$material->course_title} - {$material->course_code}.zip",
            [ 'Content-Type' => 'application/zip'] 
        );

        return redirect()->back();

    }
}
