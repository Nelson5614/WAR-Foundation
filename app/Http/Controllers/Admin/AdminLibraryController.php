<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Library;
use Illuminate\Http\Request;

class AdminLibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $library = Library::paginate(10);
        return view('admin.library', compact('library'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.library.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file_name' => 'required|string|max:255',
            'file_path' => 'required|file|mimes:pdf,doc,docx,txt'
        ]);

        $file_path = $request->file('file_path');
        $file_name = $request->input('file_name').'.'.$file_path->getClientOriginalExtension();

        //store the file
        $path = $file_path->storeAs('public/uploads', $file_name);

        //store to the database
        Library::create([
            'file_name'=>$file_name,
            'file_path'=>$path
        ]);

        return redirect()->back()->with('success', 'File uploaded successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $file = Library::findOrFail($id);
        return view('admin.library.edit', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Library $file)
    {
        $request->validate([
            'file_name' => 'required|string|max:255',
            'file_path' => 'requeired|file|mimes:pdf,doc,docx,txt'
        ]);

        $file->update($request->all());

        return redirect()->back()->with('success', 'File Updated successfully! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file =Library::findOrFail($id);
        $file->delete();

        return redirect()->back()->with('success', 'file deleted sucessfully');

    }
}
