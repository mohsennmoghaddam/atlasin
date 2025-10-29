<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HospitalCategory;
use App\Models\HospitalCategoryCatalog;
use App\Models\HospitalCategoryImage;
use App\Models\HospitalCategorySchematic;
use App\Models\HospitalCategoryStage;
use App\Models\HospitalCategorySummary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HospitalCategorySchematicController extends Controller
{
    public function index()
    {

        $summaries = HospitalCategorySummary::with('category')->orderBy('order')->get();
        $items = HospitalCategorySchematic::with('category')->orderBy('order')->get();
        $stage = HospitalCategoryStage::with('category')->orderBy('order')->get();
        $cataloge = HospitalCategoryCatalog::with('category')->orderBy('order')->get();
        $gallery = HospitalCategoryImage::with('category')->orderBy('order')->get();

        return view('Admin.product.hospital.schematic.index', compact('items' , 'summaries' , 'stage'  , 'cataloge' , 'gallery' ));
    }

    public function create()
    {
        $categories = HospitalCategory::orderBy('order')->get();
        return view('Admin.product.hospital.schematic.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:hospital_categories,id',
            'image'       => 'required|image|mimes:jpg,jpeg,png,webp|max:8192',
            'order'       => 'nullable|integer|min:1',
            'is_active'   => 'nullable|boolean',
        ]);

        $path = $request->file('image')->store('hospital/schematics', 'public');

        HospitalCategorySchematic::create([
            'category_id' => $request->category_id,
            'image'       => $path,
            'order'       => $request->input('order', 1),
            'is_active'   => (bool)$request->input('is_active', true),
        ]);

        return redirect()->route('hospital-schematics.index')->with('success', 'شماتیک ثبت شد.');
    }

    public function edit(HospitalCategorySchematic $hospital_schematic)
    {
        $categories = HospitalCategory::orderBy('order')->get();
        return view('Admin.product.hospital.schematic.edit', [
            'item' => $hospital_schematic,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, HospitalCategorySchematic $hospital_schematic)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:hospital_categories,id',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:8192',
            'order'       => 'nullable|integer|min:1',
            'is_active'   => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($hospital_schematic->image) {
                Storage::disk('public')->delete($hospital_schematic->image);
            }
            $hospital_schematic->image = $request->file('image')->store('hospital/schematics', 'public');
        }

        $hospital_schematic->category_id = $request->category_id;
        $hospital_schematic->order = $request->input('order', 1);
        $hospital_schematic->is_active = (bool)$request->input('is_active', true);
        $hospital_schematic->save();

        return redirect()->route('hospital-schematics.index')->with('success', 'شماتیک ویرایش شد.');
    }

    public function destroy(HospitalCategorySchematic $hospital_schematic)
    {
        if ($hospital_schematic->image) {
            Storage::disk('public')->delete($hospital_schematic->image);
        }
        $hospital_schematic->delete();

        return redirect()->route('hospital-schematics.index')->with('success', 'شماتیک حذف شد.');
    }
}
