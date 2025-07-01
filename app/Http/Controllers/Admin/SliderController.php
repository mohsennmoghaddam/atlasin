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

        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $slider = new Slider();

        $slider->setTranslation('title', 'en', $request->title_en);
        $slider->setTranslation('title', 'fa', $request->title_fa);

        $slider->setTranslation('description', 'en', $request->description_en);
        $slider->setTranslation('description', 'fa', $request->description_fa);


        // ذخیره تصویر (مثال ساده)
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('sliders', 'public');
            $slider->image = $path;
        }

        $slider->order = $request->order ?? 0;

        $slider->save();

        return redirect()->route('slider.index')->with('success',trans('اسلایدر با موفقیت ایجا شد'));
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
        return  view('admin.slider.edit',['slider'=>$slider]);
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
