<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomecareProductCard;
use App\Models\HomecareProductFeature;
use App\Models\HomecareSection;
use App\Models\HomecareSlider;
use App\Models\HomecareTextSection;
use Illuminate\Http\Request;

class HomecareSectionController extends Controller
{
    public function index()
    {
        $homecare = HomecareSection::all();


        $sliders = HomecareSlider::all();

        $cards = HomecareProductCard::all();

        $texts = HomecareTextSection::all();

        $features = HomecareProductFeature::all();

        $maskCategories = \App\Models\HomecareMaskCategory::with(['items' => function($q){
            $q->orderBy('order');
        }])->orderBy('order')->get();


        return view('Admin.product.homecare.first.index', compact('homecare', 'sliders' , 'cards' , 'texts'  , 'features' ,'maskCategories'));
    }

    public function create()
    {
        return view('Admin.product.homecare.first.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title.fa' => 'required|string',
            'title.en' => 'required|string',
            'body.fa'  => 'required|string',
            'body.en'  => 'required|string',
        ]);

        HomecareSection::create([
            'key'   => 'intro',
            'title' => $data['title'],
            'body'  => $data['body'],
        ]);

        return redirect()->route('homecare.index')->with('success', 'بخش معرفی با موفقیت ایجاد شد');
    }

    public function edit(HomecareSection $homecare)
    {
        return view('Admin.product.homecare.first.edit', compact('homecare'));
    }

    public function update(Request $request, HomecareSection $homecare)
    {
        $data = $request->validate([
            'title.fa' => 'required|string',
            'title.en' => 'required|string',
            'body.fa'  => 'required|string',
            'body.en'  => 'required|string',
        ]);

        $homecare->update([
            'title' => $data['title'],
            'body'  => $data['body'],
        ]);

        return redirect()->route('homecare.index')->with('success', 'بخش معرفی با موفقیت ویرایش شد');
    }

    public function destroy(HomecareSection $homecare)
    {
        $homecare->delete();
        return redirect()->back()->with('success', 'بخش حذف شد');
    }
}
