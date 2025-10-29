<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HospitalCategory;
use App\Models\HospitalTextSection;
use Illuminate\Http\Request;

class HospitalTextSectionController extends Controller
{
    public function index()
    {
        $sections = HospitalTextSection::orderBy('order')->get();
        $categories = HospitalCategory::orderBy('order')->get();
        return view('Admin.product.hospital.home.index', compact('sections' , 'categories'));
    }

    public function create()
    {
        return view('Admin.product.hospital.text.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'key'      => 'required|string|unique:hospital_text_sections,key',
            'title.fa' => 'nullable|string|max:255',
            'title.en' => 'nullable|string|max:255',
            'body.fa'  => 'required|string',
            'body.en'  => 'required|string',
            'order'    => 'nullable|integer|min:1',
        ]);

        HospitalTextSection::create($data);
        return redirect()->route('hospital-texts.index')->with('success','سکشن ذخیره شد.');
    }

    public function edit(HospitalTextSection $hospital_text)
    {
        return view('Admin.product.hospital.text.edit', ['section' => $hospital_text]);
    }

    public function update(Request $request, HospitalTextSection $hospital_text)
    {
        $data = $request->validate([
            'key'      => 'required|string|unique:hospital_text_sections,key,'.$hospital_text->id,
            'title.fa' => 'nullable|string|max:255',
            'title.en' => 'nullable|string|max:255',
            'body.fa'  => 'required|string',
            'body.en'  => 'required|string',
            'order'    => 'nullable|integer|min:1',
        ]);

        $hospital_text->update($data);
        return redirect()->route('hospital-texts.index')->with('success','سکشن ویرایش شد.');
    }

    public function destroy(HospitalTextSection $hospital_text)
    {
        $hospital_text->delete();
        return redirect()->route('hospital-texts.index')->with('success','سکشن حذف شد.');
    }
}
