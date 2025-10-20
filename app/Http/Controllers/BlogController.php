<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::with("user")->where("user_id", Auth::user()->id)->get();

        return view("my-blogs.index", compact("blogs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("my-blogs.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "title" => "required",
            "caption" => "required"
        ]);

        $validatedData["user_id"] = Auth::user()->id;

        Blog::create($validatedData);

        return redirect()->route("my-blogs.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $blog = Blog::findOrFail($id);

        return view("my-blogs.show", compact("blog"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->user_id != Auth::user()->id) {
            return abort(403);
        }

        return view("my-blogs.edit", compact("blog"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $validatedData = $request->validate([
            "title" => "required",
            "caption" => "required"
        ]);

        $validatedData["user_id"] = Auth::user()->id;

        $blog = Blog::findOrFail($id)->update($validatedData);

        return redirect()->route("my-blogs.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
