<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomecareSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomecareSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.product.homecare.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'required|image',
            'title' => 'required|array',
            'title.fa' => 'required|string',
            'title.en' => 'required|string',
            'subtitle' => 'nullable|array',
            'link' => 'nullable|url',
        ]);

        $data['image'] = $request->file('image')->store('homecare/sliders', 'public');

        HomecareSlider::create($data);

        return redirect()->route('homecare.index')->with('success', 'اسلاید با موفقیت ایجاد شد.');
    }

    public function edit(HomecareSlider $homecare_slider)
    {
        return view('Admin.product.homecare.slider.edit', compact('homecare_slider'));
    }

    public function update(Request $request, HomecareSlider $homecare_slider)
    {
        $data = $request->validate([
            'image' => 'nullable|image',
            'title' => 'required|array',
            'title.fa' => 'required|string',
            'title.en' => 'required|string',
            'subtitle' => 'nullable|array',
            'link' => 'nullable|url',
        ]);

        if ($request->hasFile('image')) {
            // حذف تصویر قبلی
            Storage::disk('public')->delete($homecare_slider->image);
            $data['image'] = $request->file('image')->store('homecare/sliders', 'public');
        }

        $homecare_slider->update($data);

        return redirect()->route('homecare.index')->with('success', 'اسلاید با موفقیت ویرایش شد.');
    }

    public function destroy(HomecareSlider $homecare_slider)
    {

        if (!empty($homecare_slider->image) && Storage::disk('public')->exists($homecare_slider->image)) {
            Storage::disk('public')->delete($homecare_slider->image);
        }

        $homecare_slider->delete();

        return redirect()->route('homecare.index')->with('success', 'اسلاید با موفقیت حذف شد.');
    }

}
