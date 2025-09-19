<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;

class HomepageController extends Controller
{
    public function index() {
        $blogs = Blog::with('user')->latest()->paginate(10);

        return view('homepage', compact('blogs'));
    }

    public function show($id) {
        $blog = Blog::with('user')->findOrFail($id);
        return view('my-blogs.showg', compact('blog'));
    }
}
