<?php
// app/Http/Controllers/Admin/HomecareTextSectionController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomecareTextSection;
use Illuminate\Http\Request;

class HomecareTextSectionController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return view('admin.product.homecare.text.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'key'        => 'required|string|unique:homecare_text_sections,key',
            'title'      => 'nullable|array',
            'title.fa'   => 'nullable|string|max:255',
            'title.en'   => 'nullable|string|max:255',
            'body'       => 'required|array',
            'body.fa'    => 'required|string',
            'body.en'    => 'required|string',
            'order'      => 'nullable|integer|min:1',
        ]);

        HomecareTextSection::create([
            'key'   => $data['key'],
            'title' => [
                'fa' => $request->input('title.fa'),
                'en' => $request->input('title.en'),
            ],
            'body'  => [
                'fa' => $request->input('body.fa'),
                'en' => $request->input('body.en'),
            ],
            'order' => $data['order'] ?? 1,
        ]);

        return redirect()->route('homecare.index')->with('success','سکشن متن ساخته شد.');

    }

    public function edit(HomecareTextSection $homecare_text)
    {
        return view('admin.product.homecare.text.edit', compact('homecare_text'));
    }

    public function update(Request $request, HomecareTextSection $homecare_text)
    {
        $data = $request->validate([
            'key'        => 'required|string|unique:homecare_text_sections,key,' . $homecare_text->id,
            'order'      => 'nullable|integer|min:1',
            'title'      => 'nullable|array',
            'title.fa'   => 'nullable|string|max:255',
            'title.en'   => 'nullable|string|max:255',
            'body'       => 'required|array',
            'body.fa'    => 'required|string',
            'body.en'    => 'required|string',
        ]);

        $homecare_text->update($data);
        return redirect()->route('homecare.index')->with('success','سکشن متن ویرایش شد.');
    }

    public function destroy(HomecareTextSection $homecare_text)
    {
        $homecare_text->delete();
        return redirect()->route('homecare.index')->with('success','سکشن متن حذف شد.');
    }
}
