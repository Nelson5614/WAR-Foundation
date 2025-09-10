<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\FAQs;
use Illuminate\Http\Request;

class FAQsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = FAQs::latest()->paginate(10);
        return view('admin.FAQ.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // The create form is handled by a modal in the index view
        return redirect()->route('faqs.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:2000'
        ], [
            'question.required' => 'The question field is required.',
            'answer.required' => 'The answer field is required.',
            'question.max' => 'The question may not be greater than 255 characters.',
            'answer.max' => 'The answer may not be greater than 2000 characters.'
        ]);

        try {
            FAQs::create($validated);
            return redirect()->route('faqs.index')
                ->with('success', 'FAQ created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error creating FAQ: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = FAQs::findOrFail($id);
        return view('admin.FAQ.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:2000'
        ], [
            'question.required' => 'The question field is required.',
            'answer.required' => 'The answer field is required.',
            'question.max' => 'The question may not be greater than 255 characters.',
            'answer.max' => 'The answer may not be greater than 2000 characters.'
        ]);

        try {
            $faq = FAQs::findOrFail($id);
            $faq->update($validated);
            
            return redirect()->route('faqs.index')
                ->with('success', 'FAQ updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error updating FAQ: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $faq = FAQs::findOrFail($id);
            $faq->delete();
            
            return redirect()->route('faqs.index')
                ->with('success', 'FAQ deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error deleting FAQ: ' . $e->getMessage());
        }
    }
}
