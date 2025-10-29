<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryCategoryController extends Controller
{
    public function index()
    {
        $categories = GalleryCategory::latest()->paginate(10);
        return view('Admin.gallery_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('Admin.gallery_categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name.fa' => 'required|string|max:255',
            'name.en' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:gallery_categories,slug',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('gallery/categories', 'public');
        }

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']['en'] ?? $data['name']['fa']);
        }

        GalleryCategory::create($data);

        return redirect()->route('gallery-categories.index')->with('success', 'دسته‌بندی با موفقیت ایجاد شد.');
    }

    public function edit(GalleryCategory $gallery_category)
    {
        return view('Admin.gallery_categories.edit', compact('gallery_category'));
    }

    public function update(Request $request, GalleryCategory $gallery_category)
    {
        $data = $request->validate([
            'name.fa' => 'required|string|max:255',
            'name.en' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:gallery_categories,slug,' . $gallery_category->id,
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        if ($request->hasFile('cover_image')) {
            if ($gallery_category->cover_image) {
                Storage::disk('public')->delete($gallery_category->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('gallery/categories', 'public');
        }

        $gallery_category->update($data);

        return redirect()->route('gallery-categories.index')->with('success', 'دسته‌بندی با موفقیت بروزرسانی شد.');
    }

    public function destroy(GalleryCategory $gallery_category)
    {
        if ($gallery_category->cover_image) {
            Storage::disk('public')->delete($gallery_category->cover_image);
        }
        $gallery_category->delete();

        return redirect()->route('gallery-categories.index')->with('success', 'دسته‌بندی حذف شد.');
    }
}
