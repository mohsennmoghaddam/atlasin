<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutIcon;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.about.index' , [

            'abouts' => About::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
//    public function store(Request $request)
//    {
//        $about = new About();
//
//        // آپلود تصاویر مثل main_image و call_us_image رو به صورت جداگانه انجام بده
//
//        $about->main_image = $request->file('main_image')->store('abouts', 'public');
//        if ($request->hasFile('call_us_image')) {
//            $about->call_us_image = $request->file('call_us_image')->store('abouts', 'public');
//        }
//
//        // اینجا داده‌های چندزبانه رو باید json_encode کنی
//        $about->title = json_encode([
//            'fa' => $request->input('title_fa'),
//            'en' => $request->input('title_en'),
//        ]);
//        $about->subtitle = json_encode([
//            'fa' => $request->input('subtitle_fa'),
//            'en' => $request->input('subtitle_en'),
//        ]);
//        $about->final_paragraph = json_encode([
//            'fa' => $request->input('final_paragraph_fa'),
//            'en' => $request->input('final_paragraph_en'),
//        ]);
//
//        $about->experience_years = $request->input('experience_years');
//        $about->experience_text_top = $request->input('experience_text_top');
//        $about->experience_text_bottom = $request->input('experience_text_bottom');
//
//        $about->call_us_text = $request->input('call_us_text');
//
//        $about->save();
//
//        // ذخیره آیکون‌ها...
//
//        return redirect()->route('about.index')->with('success', 'About created successfully.');
//    }

    public function store(Request $request)
    {



        $request->validate([
//            'main_image' => 'required|image|max:2048',
            'call_us_image' => 'nullable|image|max:2048',
            'title.fa' => 'required|string',
            'title.en' => 'required|string',
            'subtitle.fa' => 'required|string',
            'subtitle.en' => 'required|string',
            'final_paragraph.fa' => 'required|string',
            'final_paragraph.en' => 'required|string',
            'experience_years' => 'required|string',
            'icons.*.icon_image' => 'required|image|max:2048',
            'icons.*.icon_title.fa' => 'required|string',
            'icons.*.icon_title.en' => 'required|string',
            'call_us_text.fa' => 'nullable|string',
            'call_us_text.en' => 'nullable|string',
            'experience_text_top.fa' => 'nullable|string',
            'experience_text_top.en' => 'nullable|string',
            'experience_text_bottom.fa' => 'nullable|string',
            'experience_text_bottom.en' => 'nullable|string',
        ]);

        // آپلود عکس اصلی
        $mainImagePath = $request->file('main_image')->store('abouts', 'public');

        // آپلود عکس تماس (اختیاری)
        $callUsImagePath = null;
        if ($request->hasFile('call_us_image')) {
            $callUsImagePath = $request->file('call_us_image')->store('abouts', 'public');
        }

        // ساخت آرایه‌های JSON
        $title = json_encode($request->input('title'));
        $subtitle = json_encode($request->input('subtitle'));
        $finalParagraph = json_encode($request->input('final_paragraph'));
        $experienceTextTop = json_encode($request->input('experience_text_top', ['fa' => null, 'en' => null]));
        $experienceTextBottom = json_encode($request->input('experience_text_bottom', ['fa' => null, 'en' => null]));
        $callUsText = json_encode($request->input('call_us_text', ['fa' => null, 'en' => null]));

        // ذخیره About
        $about = new About();
        $about->main_image = $mainImagePath;
        $about->title = $title;
        $about->subtitle = $subtitle;
        $about->final_paragraph = $finalParagraph;
        $about->experience_years = $request->input('experience_years');
        $about->experience_text_top = $experienceTextTop;
        $about->experience_text_bottom = $experienceTextBottom;
        $about->call_us_image = $callUsImagePath;
        $about->call_us_text = $callUsText;
        $about->save();

        // ذخیره آیکون‌ها
        $icons = $request->input('icons', []);
        foreach ($icons as $index => $icon) {
            if (isset($request->file('icons')[$index]['icon_image'])) {
                $iconImagePath = $request->file('icons')[$index]['icon_image']->store('abouts/icons', 'public');
            } else {
                $iconImagePath = null;
            }

            if ($iconImagePath) {
                $about->about_icons()->create([
                    'icon_image' => $iconImagePath,
                    'icon_title' => json_encode($icon['icon_title']),
                ]);
            }
        }

        return redirect()->route('about.index')->with('success', 'بخش درباره ما با موفقیت ایجاد شد.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $aboutUs = About::with('icons')->findOrFail($id);

        return view('Admin.about.show', compact('aboutUs'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(about $about)
    {
        return view('Admin.about.edit', [

            'about' => $about,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
//    public function update(Request $request, About $about)
//    {
//        $validated = $request->validate([
//            'main_image' => 'nullable|image',
//            'title' => 'required|array',
//            'subtitle' => 'required|array',
//            'final_paragraph' => 'required|array',
//            'experience_years' => 'required',
//            'experience_text_top' => 'nullable|array',
//            'experience_text_bottom' => 'nullable|array',
//            'call_us_image' => 'nullable|image',
//            'call_us_text' => 'nullable|array',
//            'icons' => 'nullable|array',
//        ]);
//
//        // آپدیت تصاویر اگر ارسال شده
//        if ($request->hasFile('main_image')) {
//            Storage::disk('public')->delete($about->main_image);
//            $about->main_image = $request->file('main_image')->store('abouts', 'public');
//        }
//
//        if ($request->hasFile('call_us_image')) {
//            Storage::disk('public')->delete($about->call_us_image);
//            $about->call_us_image = $request->file('call_us_image')->store('abouts', 'public');
//        }
//
//        // بروزرسانی فیلدهای JSON
//        $about->title = json_encode($request->input('title'));
//        $about->subtitle = json_encode($request->input('subtitle'));
//        $about->final_paragraph = json_encode($request->input('final_paragraph'));
//        $about->experience_text_top = json_encode($request->input('experience_text_top'));
//        $about->experience_text_bottom = json_encode($request->input('experience_text_bottom'));
//        $about->call_us_text = json_encode($request->input('call_us_text'));
//
//        $about->experience_years = $request->input('experience_years');
//        $about->save();
//
//        // حذف آیکون‌های قبلی
//        foreach ($about->icons as $icon) {
//            Storage::disk('public')->delete($icon->icon_image);
//            $icon->delete();
//        }
//
//        // ذخیره آیکون‌های جدید اگر موجود بود
//        if ($request->has('icons')) {
//            foreach ($request->icons as $iconData) {
//                $iconImage = $iconData['icon_image'];
//                $storedIcon = $iconImage instanceof \Illuminate\Http\UploadedFile
//                    ? $iconImage->store('abouts/icons', 'public')
//                    : null;
//
//                $about->icons()->create([
//                    'icon_image' => $storedIcon,
//                    'icon_title' => json_encode($iconData['icon_title']),
//                ]);
//            }
//        }
//
//        return redirect()->route('about.index')->with('success', 'بخش درباره ما با موفقیت بروزرسانی شد.');
//    }
    public function update(Request $request, About $about)
    {
        // تصاویر اصلی
        if ($request->hasFile('main_image')) {
            $about->main_image = $request->file('main_image')->store('abouts', 'public');
        }

        if ($request->hasFile('call_us_image')) {
            $about->call_us_image = $request->file('call_us_image')->store('abouts', 'public');
        }

        // فیلدهای چندزبانه
        $about->title = json_encode($request->input('title'));
        $about->subtitle = json_encode($request->input('subtitle'));
        $about->final_paragraph = json_encode($request->input('final_paragraph'));
        $about->experience_text_top = json_encode($request->input('experience_text_top'));
        $about->experience_text_bottom = json_encode($request->input('experience_text_bottom'));
        $about->call_us_text = json_encode($request->input('call_us_text'));

        // فیلد غیرترجمه‌ای
        $about->experience_years = $request->input('experience_years');
        $about->save();

        // پردازش آیکون‌ها
        if ($request->has('icons')) {
            foreach ($request->icons as $iconData) {
                if (isset($iconData['id'])) {
                    // آیکون موجود: ویرایش
                    $icon = AboutIcon::find($iconData['id']);
                    if ($icon && $icon->about_id === $about->id) {
                        if (isset($iconData['icon_title'])) {
                            $icon->icon_title = json_encode($iconData['icon_title']);
                        }

                        if (isset($iconData['icon_image']) && $iconData['icon_image'] instanceof \Illuminate\Http\UploadedFile) {
                            $icon->icon_image = $iconData['icon_image']->store('about_icons', 'public');
                        }

                        $icon->save();
                    }
                } else {
                    // آیکون جدید
                    if (isset($iconData['icon_title']) && isset($iconData['icon_image'])) {
                        $newIcon = new AboutIcon();
                        $newIcon->about_id = $about->id;
                        $newIcon->icon_title = json_encode($iconData['icon_title']);
                        $newIcon->icon_image = $iconData['icon_image']->store('about_icons', 'public');
                        $newIcon->save();
                    }
                }
            }
        }

        return redirect()->route('about.index')->with('success', 'بروزرسانی با موفقیت انجام شد.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(about $about)
    {
        $about->delete();

        return redirect()->route('about.index');

    }
}
