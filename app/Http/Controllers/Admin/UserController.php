<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::with('roles')->get();
        return view('admin.user.index', compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles =  Role::all();

        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'mobile' => 'required|string|unique:users',
            'password' => 'required|string|min:6',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,id',
        ]);

        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
            'avatar' => $avatarPath,
            'secret_code' => $request->filled('secret_code') ? $request->secret_code : 'AT61',
        ]);

        $user->roles()->sync($request->roles); // اتصال نقش‌ها

        return redirect()->route('users.index')->with('success', 'کاربر با موفقیت ایجاد شد.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        if ($user->hasRole('real-admin') && auth()->id() !== $user->id) {
            abort(403, 'دسترسی غیرمجاز به کاربر real-admin');
        }

        $roles = Role::all();
        return view('admin.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'mobile' => 'nullable',
            'role_id' => 'required|exists:roles,id',
            'image' => 'nullable|image|max:2048',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
        ]);

        // آپلود تصویر جدید (در صورت وجود)
        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->storeAs('users', $filename, 'public');
            $user->image = $filename;
            $user->save();
        }

        // بروزرسانی نقش
        $user->roles()->sync([$request->role_id]);

        return redirect()->route('users.index')->with('success', 'کاربر با موفقیت ویرایش شد.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // اگر عکس پروفایل داشته باشه، حذفش کن
        if ($user->image && \Storage::disk('public')->exists('users/' . $user->image)) {
            \Storage::disk('public')->delete('users/' . $user->image);
        }

        // جدا کردن نقش‌ها
        $user->roles()->detach();

        // حذف کاربر
        $user->delete();

        return redirect()->route('users.index')->with('success', 'کاربر با موفقیت حذف شد.');
    }

}
