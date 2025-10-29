<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactService;
use Illuminate\Http\Request;

class ContactServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = ContactService::latest()->get();
        return view('Admin.contactservice.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.contactservice.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_fa' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
        ]);

        ContactService::create([
            'title' => [
                'fa' => $request->title_fa,
                'en' => $request->title_en,
            ],
        ]);

        return redirect()->route('contact-services.index');

    }





    /**
     * Display the specified resource.
     */
    public function show(ContactService $contactService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactService $contactService)
    {
        return view('Admin.contactservice.edit',[

            'ContactService' => $contactService
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactService $contactService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactService $contactService)
    {
        $contactService->delete();
        return redirect()->back()->with('success');
    }
}
