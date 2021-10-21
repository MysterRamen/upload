<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadstationController extends Controller
{
    public function store(Request $request){

    if ($request->hasFile ('upload')){
        $file = $request->file('upload');
        $filename = $file->getClientOriginalName();
        $folder = uniqid() . '-' . now()->timestamp;
        $file->storeAs('upload/tmp' . $folder, $filename);

        TemporaryFile::create([
            'folder' => $folder,
            'filename' => $filename
        ]);

        return $folder;
    }
    return '';
    }
}
