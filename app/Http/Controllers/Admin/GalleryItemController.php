<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryItem;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryItemController extends Controller
{
    public function index()
    {
        $items = GalleryItem::with('category')->latest()->paginate(10);
        return view('Admin.gallery_items.index', compact('items'));
    }

    public function create()
    {
        $categories = GalleryCategory::all();
        return view('Admin.gallery_items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'gallery_category_id' => 'required|exists:gallery_categories,id',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp',
            'title' => 'nullable|array',
            'caption' => 'nullable|array',
            'file' => 'nullable|file|mimes:pdf',
            'order' => 'nullable|integer|min:1',
        ]);

        // آپلود عکس
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('gallery', 'public');
        }

        // آپلود فایل (PDF)
        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('gallery/files', 'public');
        }

        GalleryItem::create($data);

        return redirect()->route('gallery_items.index')->with('success', 'آیتم با موفقیت ایجاد شد.');
    }


    public function edit(GalleryItem $gallery_item)
    {
        $categories = GalleryCategory::all();
        return view('Admin.gallery_items.edit', compact('gallery_item', 'categories'));
    }

    public function update(Request $request, GalleryItem $gallery_item)
    {
        $data = $request->validate([
            'gallery_category_id' => 'required|exists:gallery_categories,id',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'order' => 'nullable|integer|min:1',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($gallery_item->image) Storage::disk('public')->delete($gallery_item->image);
            $data['image'] = $request->file('image')->store('gallery', 'public');
        }

        $gallery_item->update($data);

        return redirect()->route('Admin.gallery_items.index')->with('success', 'آیتم با موفقیت بروزرسانی شد.');
    }

    public function destroy(GalleryItem $gallery_item)
    {
        if ($gallery_item->image) Storage::disk('public')->delete($gallery_item->image);
        $gallery_item->delete();
        return back()->with('success', 'آیتم حذف شد.');
    }
}
