<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\HospitalCategory;
use App\Models\HospitalCategoryCatalog;
use App\Models\HospitalCategoryImage;
use App\Models\HospitalCategorySchematic;
use App\Models\HospitalCategoryStage;
use App\Models\HospitalCategorySummary;
use App\Models\HospitalTextSection;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $locale = app()->getLocale();

        // همه سکشن‌های متنیِ بیمارستانی به ترتیب نمایش
        $textSections = HospitalTextSection::orderBy('order', 'asc')->get();
        $categories = HospitalCategory::orderBy('order')->get();
        // ارسال به ویوی مناسب زبان + پاس‌دادن locale
        return view("client.$locale.product.hospital.index", compact('textSections','locale' ,'categories'));
    }

    public function category($slug)
    {
        $locale   = app()->getLocale();

        $category = HospitalCategory::where('slug',$slug)->firstOrFail();

        $schematic = HospitalCategorySchematic::where('category_id', $category->id)
            ->where('is_active', true)
            ->orderBy('order')->first();

        $summary = HospitalCategorySummary::where('category_id',$category->id)
            ->where('is_active', true)
            ->orderBy('order','asc')
            ->first();

        $stages = HospitalCategoryStage::where('category_id',$category->id)
            ->where('is_active', true)
            ->orderBy('order')->get();


        $catalogs = HospitalCategoryCatalog::where('category_id',$category->id)
            ->where('is_active', true)
            ->orderBy('order')
            ->get();

        $gallery = HospitalCategoryImage::where('category_id',$category->id)
            ->where('is_active',true)
            ->orderBy('order')
            ->get();

        if ($locale === 'fa') {
            return view('client.FA.product.hospital.show', compact('category' , 'schematic' , 'locale' ,'summary' , 'stages' , 'catalogs' , 'gallery'));
        } else {
            return view('client.EN.product.hospital.show', compact('category' , 'schematic' , 'locale'  ,'summary'  , 'stages', 'catalogs'  , 'gallery'));
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
