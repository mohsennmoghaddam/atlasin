<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.hospital.index' , [

            'hospitals' => Hospital::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.hospital.create');
    }

    /**
     * Store a newly created resource in storage.
     */
//    public function store(Request $request)
//    {
//        $request->validate([
//            'name' => 'required|string|max:255',
//            'website' => 'nullable|url',
//            'description' => 'nullable|string',
//            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
//        ]);
//
//        $imagePath = $request->file('image')->store('hospitals', 'public');
//
//        Hospital::create([
//            'name' => $request->name,
//            'website' => $request->website,
//            'description' => $request->description,
//            'image' => $imagePath,
//        ]);
//
//        return redirect()->route('hospitals.index')->with('success', 'بیمارستان ثبت شد.');
//    }

    public function store(Request $request)
    {
        // تشخیص حالت تکی یا چندتایی
        $single = $request->hasFile('image');
        $multi  = $request->hasFile('images');

        if (! $single && ! $multi) {
            return back()->withErrors(['image' => 'حداقل یک عکس انتخاب کنید.']);
        }

        // ✅ ولیدیشن سبک
        $rules = [
            'website'        => 'nullable|string',       // دیگه url نیست
            'description'    => 'nullable|string',
            'name_strategy'  => 'nullable|in:filename,base_plus_index',
            'name'           => 'nullable|string|max:255',
        ];

        if ($single) {
            $rules['image'] = 'required|image';          // فقط تصویر بودن
        } else {
            $rules['images']   = 'required|array|min:1'; // بدون max
            $rules['images.*'] = 'image';                // فقط تصویر بودن
        }

        $validated = $request->validate($rules);

        // حالت تکی (رفتار قبلی)
        if ($single) {
            $imagePath = $request->file('image')->store('hospitals', 'public');

            \App\Models\Hospital::create([
                'name'        => $request->name ?? pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME),
                'website'     => $request->website,
                'description' => $request->description,
                'image'       => $imagePath,
            ]);

            return redirect()->route('hospitals.index')->with('success', 'بیمارستان ثبت شد.');
        }

        // حالت چندتایی
        $nameStrategy = $request->input('name_strategy', 'filename'); // filename | base_plus_index
        $created = 0;

        DB::beginTransaction();
        try {
            foreach ($request->file('images') as $idx => $file) {
                $imagePath = $file->store('hospitals', 'public');

                // نام‌گذاری
                if ($nameStrategy === 'base_plus_index' && $request->filled('name')) {
                    $name = trim($request->name) . ' ' . ($idx + 1);
                } else {
                    $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                }

                \App\Models\Hospital::create([
                    'name'        => $name,
                    'website'     => $request->website,
                    'description' => $request->description,
                    'image'       => $imagePath,
                ]);
                $created++;
            }
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->withErrors(['images' => 'خطا در ذخیره: '.$e->getMessage()]);
        }

        return redirect()->route('hospitals.index')->with('success', "{$created} بیمارستان ثبت شد.");
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
        return view('Admin.hospital.edit' , [

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
