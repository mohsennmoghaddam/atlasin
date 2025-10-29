<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();

        return view('Admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
//    public function store(Request $request)
//    {
//        $slider = new Slider();
//
//        $slider->setTranslation('title', 'en', $request->title_en);
//        $slider->setTranslation('title', 'fa', $request->title_fa);
//
//        $slider->setTranslation('description', 'en', $request->description_en);
//        $slider->setTranslation('description', 'fa', $request->description_fa);
//
//
//        // ذخیره تصویر (مثال ساده)
//        if ($request->hasFile('image')) {
//            $path = $request->file('image')->store('sliders', 'public');
//            $slider->image = $path;
//        }
//
//        $slider->order = $request->order ?? 0;
//
//        $slider->save();
//
//        return redirect()->route('slider.index')->with('success',trans('اسلایدر با موفقیت ایجا شد'));
//    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'title_fa' => 'nullable|string',
            'title_en' => 'nullable|string',
            'description_fa' => 'nullable|string',
            'description_en' => 'nullable|string',
            'order' => 'nullable|integer',
            'image_fa' => 'nullable|image|mimes:jpg,jpeg,png',
            'image_en' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        // آپلود تصویر فارسی
        if ($request->hasFile('image_fa')) {
            $data['image_fa'] = $request->file('image_fa')->store('sliders', 'public');
        }

        // آپلود تصویر انگلیسی
        if ($request->hasFile('image_en')) {
            $data['image_en'] = $request->file('image_en')->store('sliders', 'public');
        }

        // ذخیره عنوان‌ها به صورت JSON
        $slider = new Slider();
        $slider->setTranslations('title', [
            'fa' => $data['title_fa'] ?? '',
            'en' => $data['title_en'] ?? '',
        ]);
        $slider->setTranslations('description', [
            'fa' => $data['description_fa'] ?? '',
            'en' => $data['description_en'] ?? '',
        ]);
        $slider->order = $data['order'] ?? 0;
        $slider->image_fa = $data['image_fa'] ?? null;
        $slider->image_en = $data['image_en'] ?? null;
        $slider->save();

        return redirect()->route('slider.index')->with('success', 'اسلایدر ایجاد شد.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return  view('Admin.slider.edit',['slider'=>$slider]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->back();
    }
}
