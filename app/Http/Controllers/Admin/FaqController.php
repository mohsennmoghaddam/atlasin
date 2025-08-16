<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\HospitalCategory;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::with('category')->orderBy('order')->get();
        return view('admin.faq.index', compact('faqs'));
    }

    public function create()
    {
        $categories = HospitalCategory::orderBy('order')->get();
        return view('admin.faq.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id'  => 'nullable|exists:hospital_categories,id',
            'question.fa'  => 'required|string|max:255',
            'question.en'  => 'required|string|max:255',
            'answer.fa'    => 'required|string',
            'answer.en'    => 'required|string',
            'order'        => 'nullable|integer|min:1',
            'is_active'    => 'nullable|boolean',
        ]);

        Faq::create([
            'category_id' => $request->category_id,
            'question'    => $request->question,
            'answer'      => $request->answer,
            'order'       => $request->input('order', 1),
            'is_active'   => (bool)$request->input('is_active', true),
        ]);

        return redirect()->route('faqs.index')->with('success','FAQ ذخیره شد.');
    }

    public function edit(Faq $faq)
    {
        $categories = HospitalCategory::orderBy('order')->get();
        return view('admin.faq.edit', ['item'=>$faq, 'categories'=>$categories]);
    }

    public function update(Request $request, Faq $faq)
    {
        $data = $request->validate([
            'category_id'  => 'nullable|exists:hospital_categories,id',
            'question.fa'  => 'required|string|max:255',
            'question.en'  => 'required|string|max:255',
            'answer.fa'    => 'required|string',
            'answer.en'    => 'required|string',
            'order'        => 'nullable|integer|min:1',
            'is_active'    => 'nullable|boolean',
        ]);

        $faq->category_id = $request->category_id;
        $faq->question    = $request->question;
        $faq->answer      = $request->answer;
        $faq->order       = $request->input('order', 1);
        $faq->is_active   = (bool)$request->input('is_active', true);
        $faq->save();

        return redirect()->route('faqs.index')->with('success','FAQ بروزرسانی شد.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('faqs.index')->with('success','FAQ حذف شد.');
    }
}
