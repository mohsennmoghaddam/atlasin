<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomecareProductCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomecareProductCardController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return view('admin.product.homecare.card.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title.fa' => 'required|string|max:255',
            'title.en' => 'required|string|max:255',
            'description.fa' => 'required|string',
            'description.en' => 'required|string',
            'slug' => 'nullable|string|max:255',
        ]);

        $data['icon'] = $request->file('icon')->store('homecare/cards', 'public');

        HomecareProductCard::create([
            'icon' => $data['icon'],
            'title' => json_encode([
                'fa' => $request->input('title.fa'),
                'en' => $request->input('title.en'),
            ], JSON_UNESCAPED_UNICODE),
            'description' => json_encode([
                'fa' => $request->input('description.fa'),
                'en' => $request->input('description.en'),
            ], JSON_UNESCAPED_UNICODE),
            'slug' => $data['slug'] ?? null,
        ]);

        return redirect()->route('homecare.index')->with('success', 'کارت با موفقیت ذخیره شد.');
    }

    public function edit(HomecareProductCard $homecare_card)
    {
        return view('admin.product.homecare.card.edit', compact('homecare_card'));
    }

    public function update(Request $request, HomecareProductCard $homecare_card)
    {
        $data = $request->validate([
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
            'title.fa' => 'required|string|max:255',
            'title.en' => 'required|string|max:255',
            'description.fa' => 'required|string',
            'description.en' => 'required|string',
            'slug' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('icon')) {
            if ($homecare_card->icon) {
                Storage::disk('public')->delete($homecare_card->icon);
            }
            $data['icon'] = $request->file('icon')->store('homecare/cards', 'public');
            $homecare_card->icon = $data['icon'];
        }

        $homecare_card->title = json_encode([
            'fa' => $request->input('title.fa'),
            'en' => $request->input('title.en'),
        ], JSON_UNESCAPED_UNICODE);

        $homecare_card->description = json_encode([
            'fa' => $request->input('description.fa'),
            'en' => $request->input('description.en'),
        ], JSON_UNESCAPED_UNICODE);

        $homecare_card->slug = $data['slug'] ?? null;

        $homecare_card->save();

        return redirect()->route('homecare.index')->with('success', 'کارت با موفقیت ویرایش شد.');
    }

    public function destroy(HomecareProductCard $homecare_card)
    {
        if ($homecare_card->icon) {
            Storage::disk('public')->delete($homecare_card->icon);
        }

        $homecare_card->delete();

        return redirect()->route('homecare.index')->with('success', 'کارت با موفقیت حذف شد.');
    }
}
