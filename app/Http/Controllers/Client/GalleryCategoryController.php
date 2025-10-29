<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;

class GalleryCategoryController extends Controller
{
    // صفحه‌ی اصلی گالری: نمایش کتگوری‌ها
    public function index()
    {
        $locale = app()->getLocale();
        $categories = GalleryCategory::with('galleries')->get();

        // مسیر ویو طبق زبان
        if ($locale === 'fa') {
            return view('Client.FA.gallery.index', compact('categories', 'locale'));
        } else {
            return view('Client.EN.gallery.index', compact('categories', 'locale'));
        }
    }

    // صفحه‌ی نمایش تصاویر مربوط به یک دسته
    public function category($slug)
    {
        $locale = app()->getLocale();

        $category = GalleryCategory::where('slug', $slug)->with('galleries')->firstOrFail();

        if ($locale === 'fa') {
            return view('Client.FA.gallery.category', compact('category', 'locale'));
        } else {
            return view('Client.EN.gallery.category', compact('category', 'locale'));
        }
    }
}
