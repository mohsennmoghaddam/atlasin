<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.hospital.index' , [

            'hospitals' => Hospital::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.hospital.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'website' => 'nullable|url',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = $request->file('image')->store('hospitals', 'public');

        Hospital::create([
            'name' => $request->name,
            'website' => $request->website,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('hospitals.index')->with('success', 'بیمارستان ثبت شد.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Hospital $hospital)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hospital $hospital)
    {
        return view('admin.hospital.edit' , [

            'hospital' => $hospital
        ]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Hospital $hospital)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'website' => 'nullable|url',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
        ]);

        // اگر تصویر جدید آپلود شده
        if ($request->hasFile('image')) {
            // حذف تصویر قبلی در صورت وجود
            if ($hospital->image) {
                Storage::disk('public')->delete($hospital->image);
            }

            $hospital->image = $request->file('image')->store('hospitals', 'public');
        }

        $hospital->update([
            'name' => $request->name,
            'website' => $request->website,
            'description' => $request->description,
            'image' => $hospital->image, // اگر تصویر جدیدی نباشد، قبلی حفظ می‌شود
        ]);

        return redirect()->route('hospitals.index')->with('success', 'بیمارستان با موفقیت ویرایش شد.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hospital $hospital)
    {
        $hospital->delete();
        return redirect()->back()->with('success', ' یا موفقیت حذف شد');
    }
}
