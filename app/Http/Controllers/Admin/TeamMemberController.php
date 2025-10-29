<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $team_members = TeamMember::latest()->get();
        return view('Admin.team-members.index', compact('team_members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.team-members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name_fa' => 'required|string',
            'name_en' => 'required|string',
            'position_fa' => 'required|string',
            'position_en' => 'required|string',
            'email' => 'nullable|email',
            'linkedin' => 'nullable|url',
            'mobile' => 'nullable|string',
            'internal_number' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $translated = [
            'name' => ['fa' => $data['name_fa'], 'en' => $data['name_en']],
            'position' => ['fa' => $data['position_fa'], 'en' => $data['position_en']],
        ];

        if ($request->hasFile('image')) {
            $translated['image'] = $request->file('image')->store('team', 'public');
        }

        TeamMember::create(array_merge($translated, $request->only(['email', 'linkedin', 'mobile', 'internal_number'])));

        return redirect()->route('team-members.index')->with('success', 'عضو تیم با موفقیت ایجاد شد.');
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
    public function edit(TeamMember $team_member )
    {
        return view('Admin.team-members.edit', [

            'teamMember' => $team_member
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TeamMember $teamMember)
    {
        $data = $request->validate([
            'name_fa' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'position_fa' => 'required|string|max:255',
            'position_en' => 'nullable|string|max:255',
            'email' => 'nullable|email',
            'mobile' => 'nullable|string|max:20',
            'internal_number' => 'nullable|string|max:10',
            'image' => 'nullable|image|max:2048',
        ]);

        $teamMember->setTranslations('name', ['fa' => $data['name_fa'], 'en' => $data['name_en']]);
        $teamMember->setTranslations('position', ['fa' => $data['position_fa'], 'en' => $data['position_en']]);
        $teamMember->email = $data['email'];
        $teamMember->mobile = $data['mobile'];
        $teamMember->internal_number = $data['internal_number'];

        if ($request->hasFile('image')) {
            if ($teamMember->image) {
                Storage::disk('public')->delete($teamMember->image);
            }
            $teamMember->image = $request->file('image')->store('team', 'public');
        }

        $teamMember->save();

        return redirect()->route('team-members.index')->with('success', 'عضو تیم با موفقیت ویرایش شد.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeamMember $teamMember)
    {
        if ($teamMember->image) {
            Storage::disk('public')->delete($teamMember->image);
        }

        $teamMember->delete();

        return redirect()->route('team-members.index')->with('success', 'عضو تیم با موفقیت حذف شد.');
    }
}
