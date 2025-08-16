<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = BlogCategory::latest()->paginate(10);
        return view('admin.blog_categories.index', compact('categories'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog_categories.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|array',
            'name.fa' => 'required|string',
            'name.en' => 'required|string',
        ]);

        $slug = Str::slug($request->name['en']);

        BlogCategory::create([
            'name' => $request->name,
            'slug' => $slug,
        ]);

        return redirect()->route('blog-category.index')->with('success', 'دسته‌بندی با موفقیت ایجاد شد.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogCategory $blogCategory)
    {
        return view('admin.blog_categories.edit', compact('blogCategory'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogCategory $blogCategory)
    {
        $request->validate([
            'name' => 'required|array',
            'name.fa' => 'required|string',
            'name.en' => 'required|string',
        ]);

        $slug = Str::slug($request->name['en']);


        $blogCategory->update([
            'name' => $request->name,
            'slug' => $slug,
        ]);

        return redirect()->route('blogs-category.index')->with('success', 'دسته‌بندی ویرایش شد.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogCategory $blogCategory)
    {
        $blogCategory->delete();
        return back()->with('success', 'دسته‌بندی حذف شد.');
    }

}
