<?php

namespace App\Http\Controllers;

use App\Models\FAQs;
use App\Models\Staff;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function faq(){
        $staffmembers = Staff::orderBy('created_at')->get();
        $testimonials = Testimonial::inRandomOrder()->take(6)->get();
        $faqs = FAQs::orderBy('created_at')->get();
        
        // Get staff members with their photos, names, and departments
        $staff = Staff::select('name', 'last_name', 'photo', 'department')
                     ->whereNotNull('photo')
                     ->orderBy('name')
                     ->get();
                     
        return view('index', compact([
            'faqs',
            'testimonials',
            'staffmembers',
            'staff'  // Add staff data to the view
        ]));
    }
}
