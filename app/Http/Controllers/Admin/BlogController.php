<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BlogCategory::all();
        return view('admin.blogs.create', compact('categories'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|array',
            'slug' => 'nullable|string|unique:blogs,slug',
            'content' => 'required|array',
            'image' => 'nullable|image',
            'status' => 'required|in:draft,published',
            'category' => 'nullable|array',
        ]);

        // آپلود تصویر
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads/blogs', 'public');
        }

        // ساخت اسلاگ اگر وارد نشده بود
        $slug = $request->slug ?? Str::slug($request->title['en'] ?? $request->title['fa']);

        $blog = Blog::create([
            'title' => $request->title,
            'slug' => $slug,
            'short_description' => $request->short_description,
            'content' => [
                'fa' => $request->input('content.fa'),
                'en' => $request->input(    'content.en'),
            ],
            'image' => $imagePath,
            'status' => $request->status,
            'published_at' => $request->status === 'published' ? now() : null,
            'user_id' => auth()->id(),
        ]);

        // اتصال دسته‌بندی‌ها
        if ($request->categories) {
            $blog->categories()->attach($request->categories);
        }

        return redirect()->route('blogs.index')->with('success', 'مقاله با موفقیت ثبت شد.');
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
    public function edit(Blog $blog)
    {
        $categories = BlogCategory::all();
        return view('admin.blogs.edit', compact('blog', 'categories'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|array',
            'content' => 'required|array',
            'status' => 'required|in:draft,published',
            'image' => 'nullable|image',
        ]);

        // اگر تصویر جدید آپلود شده:
        if ($request->hasFile('image')) {
            // حذف عکس قبلی اگر خواستی
            if ($blog->image && Storage::disk('public')->exists($blog->image)) {
                Storage::disk('public')->delete($blog->image);
            }
            $imagePath = $request->file('image')->store('uploads/blogs', 'public');
        } else {
            $imagePath = $blog->image;
        }

        $blog->update([
            'title' => $request->input('title'),
            'short_description' => $request->input('short_description'),
            'content' => [
                'fa' => $request->input('content.fa'),
                'en' => $request->input('content.en'),
            ],
            'image' => $imagePath,
            'status' => $request->status,
            'published_at' => $request->status === 'published' ? ($blog->published_at ?? now()) : null,
        ]);

        // دسته‌ها رو آپدیت کن
        $blog->categories()->sync($request->categories ?? []);

        return redirect()->route('blogs.index')->with('success', 'مقاله با موفقیت ویرایش شد.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
