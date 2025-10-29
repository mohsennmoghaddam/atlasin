<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HospitalCategory;
use App\Models\HospitalCategoryStage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HospitalCategoryStageController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        $categories = HospitalCategory::orderBy('order')->get();
        return view('Admin.product.hospital.stage.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:hospital_categories,id',
            'title.fa'    => 'required|string|max:255',
            'title.en'    => 'required|string|max:255',
            'body.fa'     => 'nullable|string',
            'body.en'     => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:8192',
            'order'       => 'nullable|integer|min:1',
            'is_active'   => 'nullable|boolean',
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('hospital/stages', 'public');
        }

        HospitalCategoryStage::create([
            'category_id' => $request->category_id,
            'title'       => $request->title,
            'body'        => $request->body,
            'image'       => $path,
            'order'       => $request->input('order', 1),
            'is_active'   => (bool)$request->input('is_active', true),
        ]);

        return redirect()->route('hospital-schematics.index')->with('success','آیتم اجرا ذخیره شد.');
    }

    public function edit(HospitalCategoryStage $hospital_stage)
    {
        $categories = HospitalCategory::orderBy('order')->get();
        return view('Admin.product.hospital.stage.edit', [
            'item' => $hospital_stage,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, HospitalCategoryStage $hospital_stage)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:hospital_categories,id',
            'title.fa'    => 'required|string|max:255',
            'title.en'    => 'required|string|max:255',
            'body.fa'     => 'nullable|string',
            'body.en'     => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:8192',
            'order'       => 'nullable|integer|min:1',
            'is_active'   => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($hospital_stage->image) Storage::disk('public')->delete($hospital_stage->image);
            $hospital_stage->image = $request->file('image')->store('hospital/stages', 'public');
        }

        $hospital_stage->category_id = $request->category_id;
        $hospital_stage->title       = $request->title;
        $hospital_stage->body        = $request->body;
        $hospital_stage->order       = $request->input('order', 1);
        $hospital_stage->is_active   = (bool)$request->input('is_active', true);
        $hospital_stage->save();

        return redirect()->route('hospital-schematics.index')->with('success','آیتم اجرا ویرایش شد.');
    }

    public function destroy(HospitalCategoryStage $hospital_stage)
    {
        if ($hospital_stage->image) Storage::disk('public')->delete($hospital_stage->image);
        $hospital_stage->delete();
        return redirect()->route('hospital-schematics.index')->with('success','آیتم اجرا حذف شد.');
    }
}
