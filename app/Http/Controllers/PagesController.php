<?php

namespace App\Http\Controllers;

use App\Models\FAQs;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function faq(){
        $testimonials = Testimonial::inRandomOrder()->take(6)->get();
        $faqs = FAQs::orderBy('created_at')->get();
        return view('index', compact([
            'faqs',
            'testimonials'
        ]));
    }
}