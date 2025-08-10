<?php
// app/Http/Controllers/Admin/HomecareProductFeatureController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomecareProductFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomecareProductFeatureController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return view('admin.product.homecare.feature.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'             => 'required|array',
            'title.fa'          => 'required|string|max:255',
            'title.en'          => 'required|string|max:255',
            'intro'             => 'required|array',
            'intro.fa'          => 'required|string',
            'intro.en'          => 'required|string',
            'image'             => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
            'model_title'       => 'required|array',
            'model_title.fa'    => 'required|string|max:255',
            'model_title.en'    => 'required|string|max:255',
            'specs'             => 'required|array',
            'specs.fa'          => 'required|string',   // HTML از ادیتور
            'specs.en'          => 'required|string',
            'catalog'           => 'nullable|mimes:pdf,doc,docx|max:20480',
            'order'             => 'nullable|integer|min:1',
        ]);

        $imagePath = $request->file('image')->store('homecare/features', 'public');
        $catalogPath = $request->hasFile('catalog')
            ? $request->file('catalog')->store('homecare/catalogs', 'public')
            : null;

        HomecareProductFeature::create([
            'title'       => $request->title,
            'intro'       => $request->intro,
            'image'       => $imagePath,
            'model_title' => $request->model_title,
            'specs'       => $request->specs,
            'catalog'     => $catalogPath,
            'order'       => $request->input('order', 1),
        ]);

        return redirect()->route('homecare.index')->with('success','کارت محصول ثبت شد.');
    }

    public function edit(HomecareProductFeature $homecare_feature)
    {
        return view('admin.product.homecare.feature.edit', compact('homecare_feature'));
    }

    public function update(Request $request, HomecareProductFeature $homecare_feature)
    {
        $data = $request->validate([
            'title'             => 'required|array',
            'title.fa'          => 'required|string|max:255',
            'title.en'          => 'required|string|max:255',
            'intro'             => 'required|array',
            'intro.fa'          => 'required|string',
            'intro.en'          => 'required|string',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'model_title'       => 'required|array',
            'model_title.fa'    => 'required|string|max:255',
            'model_title.en'    => 'required|string|max:255',
            'specs'             => 'required|array',
            'specs.fa'          => 'required|string',
            'specs.en'          => 'required|string',
            'catalog'           => 'nullable|mimes:pdf,doc,docx|max:20480',
            'order'             => 'nullable|integer|min:1',
        ]);

        if ($request->hasFile('image')) {
            if ($homecare_feature->image) Storage::disk('public')->delete($homecare_feature->image);
            $homecare_feature->image = $request->file('image')->store('homecare/features', 'public');
        }
        if ($request->hasFile('catalog')) {
            if ($homecare_feature->catalog) Storage::disk('public')->delete($homecare_feature->catalog);
            $homecare_feature->catalog = $request->file('catalog')->store('homecare/catalogs', 'public');
        }

        $homecare_feature->title       = $request->title;
        $homecare_feature->intro       = $request->intro;
        $homecare_feature->model_title = $request->model_title;
        $homecare_feature->specs       = $request->specs;
        $homecare_feature->order       = $request->input('order', 1);
        $homecare_feature->save();

        return redirect()->route('homecare-features.index')->with('success','کارت محصول ویرایش شد.');
    }

    public function destroy(HomecareProductFeature $homecare_feature)
    {
        if ($homecare_feature->image)   Storage::disk('public')->delete($homecare_feature->image);
        if ($homecare_feature->catalog) Storage::disk('public')->delete($homecare_feature->catalog);
        $homecare_feature->delete();

        return redirect()->route('homecare.index')->with('success','کارت محصول حذف شد.');
    }
}
