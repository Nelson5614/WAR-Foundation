<?php

namespace App\Http\Controllers\Counselor;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use App\Models\StudentSession;
use App\Http\Controllers\Controller;


class FileDownloadController extends Controller
{
    public function download($id)
    {
        $studentfile = StudentSession::findOrFail($id);
        $pdf = PDF::loadView('counselors.studentfile.pdf', compact('studentfile'));

        return $pdf->download('student-file.pdf');
    }
}
