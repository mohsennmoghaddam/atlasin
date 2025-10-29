<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HospitalCategory;
use App\Models\HospitalCategoryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HospitalCategoryImageController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        $categories = HospitalCategory::orderBy('order')->get();
        return view('Admin.product.hospital.gallery_items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id'    => 'required|exists:hospital_categories,id',
            'images.*'       => 'required|image|mimes:jpg,jpeg,png,webp|max:8192',
            'title.fa'       => 'nullable|string|max:255',
            'title.en'       => 'nullable|string|max:255',
            'order'          => 'nullable|integer|min:1',
            'is_active'      => 'nullable|boolean',
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $idx => $file) {
                $path = $file->store('hospital/gallery_items', 'public');
                HospitalCategoryImage::create([
                    'category_id' => $request->category_id,
                    'image'       => $path,
                    'title'       => $request->title ? $request->title : null,
                    'order'       => $request->input('order', 1) + $idx,
                    'is_active'   => (bool)$request->input('is_active', true),
                ]);
            }
        }

        return redirect()->route('hospital-schematics.index')->with('success','تصاویر افزوده شد.');
    }

    public function edit(HospitalCategoryImage $hospital_gallery)
    {
        $categories = HospitalCategory::orderBy('order')->get();
        return view('Admin.product.hospital.gallery_items.edit', [
            'item' => $hospital_gallery,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, HospitalCategoryImage $hospital_gallery)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:hospital_categories,id',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:8192',
            'title.fa'    => 'nullable|string|max:255',
            'title.en'    => 'nullable|string|max:255',
            'order'       => 'nullable|integer|min:1',
            'is_active'   => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($hospital_gallery->image) Storage::disk('public')->delete($hospital_gallery->image);
            $hospital_gallery->image = $request->file('image')->store('hospital/gallery_items', 'public');
        }

        $hospital_gallery->category_id = $request->category_id;
        $hospital_gallery->title       = $request->title ?: null;
        $hospital_gallery->order       = $request->input('order', 1);
        $hospital_gallery->is_active   = (bool)$request->input('is_active', true);
        $hospital_gallery->save();

        return redirect()->route('hospital-schematics.index')->with('success','تصویر بروزرسانی شد.');
    }

    public function destroy(HospitalCategoryImage $hospital_gallery)
    {
        if ($hospital_gallery->image) Storage::disk('public')->delete($hospital_gallery->image);
        $hospital_gallery->delete();

        return redirect()->route('hospital-schematics.index')->with('success','تصویر حذف شد.');
    }
}
