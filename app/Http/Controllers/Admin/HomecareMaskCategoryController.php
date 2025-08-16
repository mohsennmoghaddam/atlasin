<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomecareMaskCategory;
use App\Models\HomecareMaskItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomecareMaskCategoryController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return view('admin.product.homecare.mask.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title.fa'   => 'required|string|max:255',
            'title.en'   => 'required|string|max:255',
            'order'      => 'nullable|integer|min:1',
            // چند فایل تصویر:
            'images.*'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $category = HomecareMaskCategory::create([
            'title' => $request->title,
            'order' => $request->input('order', 1),
        ]);

        // ذخیره آیتم‌ها
        if ($request->hasFile('images')) {
            $i = 1;
            foreach ($request->file('images') as $file) {
                $path = $file->store('homecare/masks', 'public');
                HomecareMaskItem::create([
                    'category_id' => $category->id,
                    'image'       => $path,
                    'order'       => $i++,
                ]);
            }
        }

        return redirect()->route('homecare.index')->with('success', 'گروه ماسک ایجاد شد.');
    }

    public function edit(HomecareMaskCategory $homecare_mask_category)
    {
        $category = $homecare_mask_category->load('items');
        return view('admin.product.homecare.mask.edit', compact('category'));
    }

    public function update(Request $request, HomecareMaskCategory $homecare_mask_category)
    {
        $data = $request->validate([
            'title.fa'   => 'required|string|max:255',
            'title.en'   => 'required|string|max:255',
            'order'      => 'nullable|integer|min:1',

            // آپلود تصاویر جدید
            'images.*'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

            // به‌روزرسانی ترتیب/حذف آیتم‌های قبلی
            'items'      => 'nullable|array',
            'items.*.id'    => 'required_with:items|integer|exists:homecare_mask_items,id',
            'items.*.order' => 'nullable|integer|min:1',
            'items.*._delete' => 'nullable|boolean',
        ]);

        // آپدیت دسته
        $homecare_mask_category->update([
            'title' => $request->title,
            'order' => $request->input('order', 1),
        ]);

        // به‌روزرسانی آیتم‌های موجود
        if ($request->filled('items')) {
            foreach ($request->items as $row) {
                $item = HomecareMaskItem::where('category_id', $homecare_mask_category->id)
                    ->where('id', $row['id'])->first();

                if (!$item) continue;

                // حذف؟
                if (!empty($row['_delete'])) {
                    Storage::disk('public')->delete($item->image);
                    $item->delete();
                    continue;
                }

                // آپدیت ترتیب
                $item->order = $row['order'] ?? $item->order;
                $item->save();
            }
        }

        // افزودن تصاویر جدید
        if ($request->hasFile('images')) {
            // آخرین ترتیب موجود
            $lastOrder = (int)($homecare_mask_category->items()->max('order') ?? 0);
            foreach ($request->file('images') as $file) {
                $path = $file->store('homecare/masks', 'public');
                HomecareMaskItem::create([
                    'category_id' => $homecare_mask_category->id,
                    'image'       => $path,
                    'order'       => ++$lastOrder,
                ]);
            }
        }

        return redirect()->route('homecare-mask-category.edit', $homecare_mask_category)
            ->with('success', 'ویرایش با موفقیت انجام شد.');
    }

    public function destroy(HomecareMaskCategory $homecare_mask_category)
    {
        // حذف فایل‌های آیتم‌ها
        foreach ($homecare_mask_category->items as $it) {
            Storage::disk('public')->delete($it->image);
        }
        $homecare_mask_category->delete();

        return redirect()->route('homecare-mask-category.index')->with('success', 'گروه حذف شد.');
    }

    // حذف آیتم تکی (اختیاری)
    public function destroyItem(HomecareMaskItem $item)
    {
        Storage::disk('public')->delete($item->image);
        $item->delete();
        return back()->with('success', 'تصویر حذف شد.');
    }
}
