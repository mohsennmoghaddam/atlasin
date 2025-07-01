<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\ContactService;
use App\Models\Slider;
use App\Models\TeamMember;
use App\Models\WhyUs;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $locale = app()->getLocale(); // 'fa' یا 'en'

        // گرفتن اسلایدها از دیتابیس بر اساس ترتیب
        $sliders = Slider::query()->orderBy('order', 'asc')->get();

        $services=ContactService::all();

        $members = TeamMember::all();

        $about = About::with('icons')->first();

        $whyUs = WhyUs::with('items')->first();
        // مسیر ویو طبق زبان
        if ($locale === 'fa') {
            return view('client.FA.home.index', compact('sliders' , 'about' , 'services' , 'members' , 'whyUs'));
        } else {
            return view('client.EN.home.index', compact('sliders' , 'about' , 'services' , 'members' , 'whyUs'));
        }
    }
}
