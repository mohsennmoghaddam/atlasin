<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\ContactService;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locale = app()->getLocale(); // 'fa' یا 'en'
        $services=ContactService::all();

        if ($locale === 'fa') {

            return view('client.FA.ContactUs.index', compact( 'locale' , 'services'));
        } else {
            return view('client.EN.ContactUs.index', compact( 'locale' , 'services'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|max:20',
            'contact_service_id' => 'required|exists:contact_services,id',
            'message' => 'nullable|string|max:2000',
        ]);

        ContactUs::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'contact_service_id' => $request->contact_service_id,
            'message' => $request->message, // پیام فارسی یا انگلیسی بسته به زبان جاری
        ]);

        return redirect()->back()->with('success', __('پیام شما با موفقیت ثبت شد.'));
    }


    /**
     * Display the specified resource.
     */
    public function show(ContactUs $contactUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactUs $contactUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactUs $contactUs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactUs $contactUs)
    {
        //
    }
}
