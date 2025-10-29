<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $locale = app()->getLocale();

        // پست را با دسته‌ها و نویسنده بگیر (بر اساس slug)
        $blog = Blog::with(['categories', 'author'])
            ->where('slug', $slug)
            ->firstOrFail();

        // انتخاب ویو بر اساس زبان
        if ($locale === 'fa') {
            return view('Client.FA.blog.show', compact('blog', 'locale'));
        } else {
            return view('Client.EN.blog.show', compact('blog', 'locale'));
        }
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
