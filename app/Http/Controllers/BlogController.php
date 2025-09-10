<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the blog posts.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $posts = Blog::latest()->paginate(9);
        return view('blog.index', compact('posts'));
    }

    /**
     * Display the specified blog post.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $post = Blog::findOrFail($id);
        $recentPosts = Blog::where('id', '!=', $id)
            ->latest()
            ->take(3)
            ->get();
            
        return view('blog.show', compact('post', 'recentPosts'));
    }
}
