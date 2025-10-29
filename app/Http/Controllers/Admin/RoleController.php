<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.role.index' , ['roles' => Role::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name|max:255',
        ]);

        Role::create([
            'name' => $request->name,
            'guard_name' => 'web', // اگر از چند گارد استفاده نمی‌کنی، همون 'web' باشه
        ]);

        return redirect()->route('role.index')->with('success', 'نقش با موفقیت ایجاد شد.');
    }

    /**
     * Display the specified resource.
     */

    public function editPermissions(Role $role)
    {
        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('id')->toArray();

        return view('Admin.role.permissions', compact('role', 'permissions', 'rolePermissions'));
    }

    public function updatePermissions(Request $request, Role $role)
    {
        $request->validate([
            'permission' => 'nullable|array',
            'permission.*' => 'exists:permission,id',
        ]);

        // اختصاص سطح دسترسی‌ها
        $role->permissions()->sync($request->permissions ?? []);

        return back()->with('success', 'سطح دسترسی‌ها با موفقیت بروزرسانی شد.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        // (اختیاری) جلوگیری از حذف نقش اصلی
        if ($role->name === 'Real-Admin') {
            return back()->with('error', 'حذف نقش Real-Admin مجاز نیست.');
        }

        DB::transaction(function () use ($role) {
            // قطع اتصال از همه‌ی پرمیشن‌ها
            $role->permissions()->detach();

            // قطع اتصال از همه‌ی کاربران
            $role->users()->detach();

            // حذف خود نقش
            $role->delete();
        });

        return back()->with('success', 'نقش با موفقیت حذف شد.');
    }
}
