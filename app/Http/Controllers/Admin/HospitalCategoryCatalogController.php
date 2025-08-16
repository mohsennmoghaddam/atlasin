<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HospitalCategory;
use App\Models\HospitalCategoryCatalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HospitalCategoryCatalogController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        $categories = HospitalCategory::orderBy('order')->get();
        return view('admin.product.hospital.catalog.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:hospital_categories,id',
            'title.fa'    => 'required|string|max:255',
            'title.en'    => 'required|string|max:255',
            'file'        => 'required|mimes:pdf|max:30720', // تا 30MB
            'order'       => 'nullable|integer|min:1',
            'is_active'   => 'nullable|boolean',
        ]);

        $path = $request->file('file')->store('hospital/catalogs', 'public');

        HospitalCategoryCatalog::create([
            'category_id' => $request->category_id,
            'title'       => $request->title,
            'file'        => $path,
            'order'       => $request->input('order', 1),
            'is_active'   => (bool)$request->input('is_active', true),
        ]);

        return redirect()->route('hospital-schematics.index')->with('success', 'کاتالوگ ذخیره شد.');
    }

    public function edit(HospitalCategoryCatalog $hospital_catalog)
    {
        $categories = HospitalCategory::orderBy('order')->get();
        return view('admin.product.hospital.catalog.edit', [
            'item' => $hospital_catalog,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, HospitalCategoryCatalog $hospital_catalog)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:hospital_categories,id',
            'title.fa'    => 'required|string|max:255',
            'title.en'    => 'required|string|max:255',
            'file'        => 'nullable|mimes:pdf|max:30720',
            'order'       => 'nullable|integer|min:1',
            'is_active'   => 'nullable|boolean',
        ]);

        if ($request->hasFile('file')) {
            if ($hospital_catalog->file) Storage::disk('public')->delete($hospital_catalog->file);
            $hospital_catalog->file = $request->file('file')->store('hospital/catalogs', 'public');
        }

        $hospital_catalog->category_id = $request->category_id;
        $hospital_catalog->title       = $request->title;
        $hospital_catalog->order       = $request->input('order', 1);
        $hospital_catalog->is_active   = (bool)$request->input('is_active', true);
        $hospital_catalog->save();

        return redirect()->route('hospital-schematics.index')->with('success', 'کاتالوگ بروزرسانی شد.');
    }

    public function destroy(HospitalCategoryCatalog $hospital_catalog)
    {
        if ($hospital_catalog->file) Storage::disk('public')->delete($hospital_catalog->file);
        $hospital_catalog->delete();

        return redirect()->route('hospital-schematics.index')->with('success', 'کاتالوگ حذف شد.');
    }
}
