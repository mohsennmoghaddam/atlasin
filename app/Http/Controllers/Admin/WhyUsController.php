<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyUs;
use App\Models\WhyUsItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WhyUsController extends Controller
{
    public function index()
    {
        $whyUses = WhyUs::with('items')->latest()->get();
        return view('Admin.whyUs.index', compact('whyUses'));
    }

    public function create()
    {
        return view('Admin.whyUs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|array',
            'title.fa' => 'required|string|max:255',
            'title.en' => 'required|string|max:255',
            'description' => 'nullable|array',
            'description.fa' => 'nullable|string|max:1000',
            'description.en' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg',
            'items' => 'nullable|array',
            'items.*.title' => 'nullable|array',
            'items.*.title.fa' => 'nullable|string',
            'items.*.title.en' => 'nullable|string',
            'items.*.icon' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:1024',
        ]);

        $imagePath = $request->file('image')?->store('whyus', 'public');

        $whyUs = WhyUs::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        if ($request->has('items')) {
            foreach ($request->items as $item) {
                $iconPath = isset($item['icon']) && $item['icon'] instanceof \Illuminate\Http\UploadedFile
                    ? $item['icon']->store('whyus/icons', 'public')
                    : null;

                $whyUs->items()->create([
                    'title' => $item['title'] ?? ['fa' => '', 'en' => ''],
                    'icon' => $iconPath,
                ]);
            }
        }

        return redirect()->route('why-uses.index')->with('success', 'آیتم با موفقیت ثبت شد.');
    }

    public function edit(WhyUs $whyUse)
    {
        $whyUse->load('items');
        return view('Admin.whyUs.edit', compact('whyUse'));
    }

    public function update(Request $request, WhyUs $whyUse)
    {
        $request->validate([
            'title' => 'required|array',
            'title.fa' => 'required|string|max:255',
            'title.en' => 'required|string|max:255',
            'description' => 'nullable|array',
            'description.fa' => 'nullable|string|max:2000',
            'description.en' => 'nullable|string|max:2000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp',
            'items' => 'nullable|array',
            'items.*.id' => 'nullable|exists:why_us_items,id',
            'items.*.title' => 'nullable|array',
            'items.*.title.fa' => 'nullable|string|max:255',
            'items.*.title.en' => 'nullable|string|max:255',
            'items.*.icon' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp',
            'items_to_delete' => 'nullable|array',
            'items_to_delete.*' => 'integer|exists:why_us_items,id',
        ]);

        // حذف تصویر قبلی و آپلود جدید
        if ($request->hasFile('image')) {
            if ($whyUse->image) {
                Storage::disk('public')->delete($whyUse->image);
            }
            $whyUse->image = $request->file('image')->store('whyus', 'public');
        }

        $whyUse->title = $request->title;
        $whyUse->description = $request->description;
        $whyUse->save();

        // حذف آیتم‌های انتخاب شده
        if ($request->filled('items_to_delete')) {
            foreach (WhyUsItem::whereIn('id', $request->items_to_delete)->get() as $item) {
                if ($item->icon) {
                    Storage::disk('public')->delete($item->icon);
                }
                $item->delete();
            }
        }

        // ذخیره یا آپدیت آیتم‌ها
        if ($request->has('items')) {
            foreach ($request->items as $itemData) {
                $itemModel = !empty($itemData['id']) ? WhyUsItem::find($itemData['id']) : null;

                $iconPath = null;
                if (isset($itemData['icon']) && $itemData['icon'] instanceof \Illuminate\Http\UploadedFile) {
                    if ($itemModel && $itemModel->icon) {
                        Storage::disk('public')->delete($itemModel->icon);
                    }
                    $iconPath = $itemData['icon']->store('whyus/icons', 'public');
                } else {
                    $iconPath = $itemModel?->icon;
                }

                if ($itemModel) {
                    $itemModel->update([
                        'title' => $itemData['title'] ?? ['fa' => '', 'en' => ''],
                        'icon' => $iconPath,
                    ]);
                } else {
                    $whyUse->items()->create([
                        'title' => $itemData['title'] ?? ['fa' => '', 'en' => ''],
                        'icon' => $iconPath,
                    ]);
                }
            }
        }

        return redirect()->route('why-uses.index')->with('success', 'تغییرات با موفقیت ذخیره شد.');
    }

    public function destroy(WhyUs $whyUse)
    {
        foreach ($whyUse->items as $item) {
            if ($item->icon) {
                Storage::disk('public')->delete($item->icon);
            }
        }

        if ($whyUse->image) {
            Storage::disk('public')->delete($whyUse->image);
        }

        $whyUse->items()->delete();
        $whyUse->delete();

        return redirect()->route('why-uses.index')->with('success', 'با موفقیت حذف شد.');
    }
}
