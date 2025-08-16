<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HospitalCategory;
use App\Models\HospitalCategorySummary;
use Illuminate\Http\Request;

class HospitalCategorySummaryController extends Controller
{
    public function index()
    {
        $summaries = HospitalCategorySummary::with('category')->orderBy('order')->get();
        return view('admin.product.hospital.summary.index', compact('summaries'));
    }

    public function create()
    {
        $categories = HospitalCategory::orderBy('order')->get();
        return view('admin.product.hospital.summary.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'category_id'  => 'required|exists:hospital_categories,id',
            'title.fa'     => 'nullable|string|max:255',
            'title.en'     => 'nullable|string|max:255',
            'body.fa'      => 'required|string',
            'body.en'      => 'required|string',
            'order'        => 'nullable|integer|min:1',
            'is_active'    => 'nullable|boolean',
        ]);

        HospitalCategorySummary::create([
            'category_id' => $request->category_id,
            'title'       => $request->title,
            'body'        => $request->body,
            'order'       => $request->input('order', 1),
            'is_active'   => (bool)$request->input('is_active', true),
        ]);

        return redirect()->route('hospital-schematics.index')->with('success','سکشن توضیح مختصر ذخیره شد.');
    }

    public function edit(HospitalCategorySummary $hospital_summary)
    {
        $categories = HospitalCategory::orderBy('order')->get();
        return view('admin.product.hospital.summary.edit', [
            'item' => $hospital_summary,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, HospitalCategorySummary $hospital_summary)
    {
        $data = $request->validate([
            'category_id'  => 'required|exists:hospital_categories,id',
            'title.fa'     => 'nullable|string|max:255',
            'title.en'     => 'nullable|string|max:255',
            'body.fa'      => 'required|string',
            'body.en'      => 'required|string',
            'order'        => 'nullable|integer|min:1',
            'is_active'    => 'nullable|boolean',
        ]);

        $hospital_summary->category_id = $request->category_id;
        $hospital_summary->title       = $request->title;
        $hospital_summary->body        = $request->body;
        $hospital_summary->order       = $request->input('order', 1);
        $hospital_summary->is_active   = (bool)$request->input('is_active', true);
        $hospital_summary->save();

        return redirect()->route('hospital-schematics.index')->with('success','سکشن ویرایش شد.');
    }

    public function destroy(HospitalCategorySummary $hospital_summary)
    {
        $hospital_summary->delete();
        return redirect()->route('hospital-schematics.index')->with('success','سکشن حذف شد.');
    }
}
