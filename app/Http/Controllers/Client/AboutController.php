<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $about = About::with('icons')->first();

        $members = TeamMember::all();

        $locale = app()->getLocale(); // 'fa' یا 'en'

        if ($locale === 'fa') {

            return view('client.FA.about.index', compact('about' , 'members' , 'locale'));
        } else {
            return view('client.EN.about.index', compact('about' , 'members' , 'locale'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
