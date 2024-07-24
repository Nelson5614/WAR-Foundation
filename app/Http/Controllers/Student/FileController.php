<?php

namespace App\Http\Controllers\Student;
use App\Models\Library;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function download($id) {
        $file = Library::findOrFail($id);
        return Storage::download($file->file_path, $file->file_name);

     }

}
