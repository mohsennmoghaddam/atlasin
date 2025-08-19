<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\ContactService;
use App\Models\Faq;
use App\Models\Hospital;
use App\Models\Slider;
use App\Models\TeamMember;
use App\Models\WhyUs;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index( Request $request)
    {
        $locale = app()->getLocale(); // 'fa' یا 'en'

        // گرفتن اسلایدها از دیتابیس بر اساس ترتیب
        $sliders = Slider::query()->orderBy('order', 'asc')->get();

        $services=ContactService::all();

        $members = TeamMember::all();

        $about = About::with('icons')->first();

        $whyUs = WhyUs::with('items')->first();

        $hospitals =  Hospital::all();

        $globalFaqs = Faq::all();

        $blogs = Blog::with('categories')
            ->where('status','published')
            ->when(request('category'), function($q){
                $cat = request('category');
                $q->whereHas('categories', fn($cq)=>$cq->where('slug',$cat)->orWhere('blog_categories.id',$cat));
            })
            ->latest()
            ->paginate(6)
            ->withQueryString();

        $categories = BlogCategory::orderBy('slug')->get();

        // مسیر ویو طبق زبان
        if ($locale === 'fa') {
            return view('client.FA.home.index', compact('sliders' , 'about' , 'services' , 'members' , 'whyUs' , 'hospitals' , 'globalFaqs' , 'blogs' , 'categories'));
        } else {
            return view('client.EN.home.index', compact('sliders' , 'about' , 'services' , 'members' , 'whyUs' ,  'hospitals'  , 'globalFaqs' , 'blogs' , 'categories'));
        }
    }
}
