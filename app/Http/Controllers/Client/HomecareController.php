<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\HomecareProductCard;
use App\Models\HomecareProductFeature;
use App\Models\HomecareSection;
use App\Models\HomecareSlider;
use App\Models\HomecareTextSection;

class HomecareController extends Controller
{
    public function index()
    {
        $locale = app()->getLocale(); // 'fa' یا 'en'

        // سکشن اول (معرفی)
        $intro = HomecareSection::where('key', 'intro')->first();

        // اسلایدرها
        $sliders = HomecareSlider::orderBy('id', 'asc')->get();

        $cards = HomecareProductCard::all();

        $textAfterCards = HomecareTextSection::where('key','post_cards_text')->first();

        $features   = HomecareProductFeature::orderBy('order')->get();


        $maskText = HomecareTextSection::where('key', 'mask')->first();

        $maskCategories = \App\Models\HomecareMaskCategory::with(['items' => function($q){
            $q->orderBy('order');
        }])->orderBy('order')->get();

        // سایر سکشن‌ها در آینده اضافه خواهند شد (مثلاً خدمات، ویژگی‌ها، محصولات و ...)

        // نمایش ویو بر اساس زبان
        if ($locale === 'fa') {
            return view('client.FA.product.homecare.index', [
                'title'   => $intro->title['fa'] ?? '',
                'body'    => $intro->body['fa'] ?? '',
                'sliders' => $sliders,
                'cards'    => $cards,
                'textAfterCards' => $textAfterCards,
                'features'  => $features,
                'maskText'  => $maskText,
                'maskCategories'  => $maskCategories,
            ]);
        } else {
            return view('client.EN.product.homecare.index', [
                'title'   => $intro->title['en'] ?? '',
                'body'    => $intro->body['en'] ?? '',
                'sliders' => $sliders,
                'cards'    => $cards,
                'textAfterCards' => $textAfterCards,
                'features'  => $features,
                'maskText'  => $maskText,
                'maskCategories'  => $maskCategories,
            ]);
        }
    }
}
