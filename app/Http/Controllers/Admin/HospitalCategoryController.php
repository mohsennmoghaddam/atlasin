<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HospitalCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HospitalCategoryController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return view('admin.product.hospital.category.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'slug'          => 'required|string|alpha_dash|unique:hospital_categories,slug|max:150',
            'title.fa'      => 'required|string|max:255',
            'title.en'      => 'required|string|max:255',
            'subtitle.fa'   => 'nullable|string|max:255',
            'subtitle.en'   => 'nullable|string|max:255',
//            'icon'          => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:4096',
//            'order'         => 'nullable|integer|min:1',
        ]);

        $path = $request->file('icon')->store('hospital/category', 'public');

        HospitalCategory::create([
            'slug'     => $data['slug'],
            'title'    => $request->title,
            'subtitle' => $request->subtitle,
            'icon'     => $path,
            'order'    => $request->input('order', 1),
        ]);

        return redirect()->route('hospital-texts.index')->with('success','دسته‌بندی ایجاد شد.');
    }

    public function edit(HospitalCategory $hospital_category)
    {
        return view('admin.product.hospital.category.edit', compact('hospital_category'));
    }

    public function update(Request $request, HospitalCategory $hospital_category)
    {
        $data = $request->validate([
            'slug'          => 'required|string|alpha_dash|max:150|unique:hospital_categories,slug,'.$hospital_category->id,
            'title.fa'      => 'required|string|max:255',
            'title.en'      => 'required|string|max:255',
            'subtitle.fa'   => 'nullable|string|max:255',
            'subtitle.en'   => 'nullable|string|max:255',
            'icon'          => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:4096',
            'order'         => 'nullable|integer|min:1',
        ]);

        if ($request->hasFile('icon')) {
            if ($hospital_category->icon) Storage::disk('public')->delete($hospital_category->icon);
            $hospital_category->icon = $request->file('icon')->store('hospital/category', 'public');
        }

        $hospital_category->slug     = $data['slug'];
        $hospital_category->title    = $request->title;
        $hospital_category->subtitle = $request->subtitle;
        $hospital_category->order    = $request->input('order', 1);
        $hospital_category->save();

        return redirect()->route('hospital-texts.index')->with('success','دسته‌بندی ویرایش شد.');
    }

    public function destroy(HospitalCategory $hospital_category)
    {
        if ($hospital_category->icon) Storage::disk('public')->delete($hospital_category->icon);
        $hospital_category->delete();
        return redirect()->route('hospital-texts.index')->with('success','حذف شد.');
    }
}
