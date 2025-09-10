<?php

namespace App\Http\Controllers\Admin;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $staff = Staff::latest()->paginate(10);
        return view('admin.staff.index', compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:staff,email',
            'phone' => 'required|string|max:20',
            'department' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bio' => 'nullable|string|max:1000',
        ], [
            'name.required' => 'The first name field is required.',
            'last_name.required' => 'The last name field is required.',
            'email.required' => 'The email field is required.',
            'email.unique' => 'This email is already in use.',
            'phone.required' => 'The phone number is required.',
            'department.required' => 'The department field is required.',
            'photo.image' => 'The photo must be an image file.',
            'photo.mimes' => 'The photo must be a file of type: jpeg, png, jpg, gif, svg.',
            'photo.max' => 'The photo must not be larger than 2MB.',
            'bio.max' => 'The bio must not be longer than 1000 characters.'
        ]);

        try {
            // Handle file upload if photo exists
            $photoPath = 'assets/images/team/default.png';
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('staff/photos', 'public');
            }

            Staff::create([
                'name' => $validated['name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'department' => $validated['department'],
                'photo' => $photoPath,
                'bio' => $validated['bio'] ?? null,
            ]);

            return redirect()->route('staff.index')
                ->with('success', 'Staff member added successfully!');
                
        } catch (\Exception $e) {
            // Delete the uploaded file if an error occurs
            if (isset($photoPath) && $photoPath !== 'assets/images/team/default.png') {
                Storage::disk('public')->delete($photoPath);
            }
            
            Log::error('Error creating staff member: ' . $e->getMessage());
            
            return redirect()->back()
                ->with('error', 'Error creating staff member. Please try again.')
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
        // Not implemented as we're showing details in the index
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        return view('admin.staff.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $staff = Staff::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:staff,email,' . $staff->id,
            'phone' => 'required|string|max:20',
            'department' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bio' => 'nullable|string|max:1000',
        ], [
            'name.required' => 'The first name field is required.',
            'last_name.required' => 'The last name field is required.',
            'email.required' => 'The email field is required.',
            'email.unique' => 'This email is already in use.',
            'phone.required' => 'The phone number is required.',
            'department.required' => 'The department field is required.',
            'photo.image' => 'The photo must be an image file.',
            'photo.mimes' => 'The photo must be a file of type: jpeg, png, jpg, gif, svg.',
            'photo.max' => 'The photo must not be larger than 2MB.',
            'bio.max' => 'The bio must not be longer than 1000 characters.'
        ]);

        try {
            // Handle file upload if a new photo is provided
            if ($request->hasFile('photo')) {
                // Delete old photo if it's not the default
                if ($staff->photo && $staff->photo !== 'assets/images/team/default.png') {
                    Storage::disk('public')->delete($staff->photo);
                }
                $validated['photo'] = $request->file('photo')->store('staff/photos', 'public');
            } else if (!isset($validated['photo'])) {
                // Keep the existing photo if no new one is uploaded
                unset($validated['photo']);
            }

            $staff->update($validated);

            return redirect()->route('staff.index')
                ->with('success', 'Staff member updated successfully!');
                
        } catch (\Exception $e) {
            // Delete the uploaded file if an error occurs
            if (isset($validated['photo'])) {
                Storage::disk('public')->delete($validated['photo']);
            }
            
            Log::error('Error updating staff member: ' . $e->getMessage());
            
            return redirect()->back()
                ->with('error', 'Error updating staff member. Please try again.')
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $staff = Staff::findOrFail($id);
        
        try {
            // Store the photo path before deletion
            $photoPath = $staff->photo;
            
            // Delete the staff member
            $staff->delete();
            
            // Delete the photo if it's not the default
            if ($photoPath && $photoPath !== 'assets/images/team/default.png') {
                Storage::disk('public')->delete($photoPath);
            }
            
            return redirect()->route('staff.index')
                ->with('success', 'Staff member deleted successfully!');
                
        } catch (\Exception $e) {
            Log::error('Error deleting staff member: ' . $e->getMessage());
            
            return redirect()->route('staff.index')
                ->with('error', 'Error deleting staff member. Please try again.');
        }
    }
}
