<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::with('roles')->get();
        return view('Admin.user.index', compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles =  Role::all();

        return view('Admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'mobile'   => 'required|string|unique:users',
            'password' => 'required|string|min:6',
            'avatar'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'roles'    => 'required|array',
            'roles.*'  => 'exists:roles,id',
        ]);

        $fileName = null;
        if ($request->hasFile('avatar')) {
            // نام یکتا
            $ext = $request->file('avatar')->getClientOriginalExtension();
            $fileName = Str::uuid().'.'.$ext;
            // ذخیره داخل storage/app/public/users
            $request->file('avatar')->storeAs('users', $fileName, 'public');
        }

        $user = User::create([
            'name'        => $request->name,
            'email'       => $request->email,
            'mobile'      => $request->mobile,
            'password'    => Hash::make($request->password),
            'avatar'      => $fileName, // فقط نام فایل
            'secret_code' => $request->filled('secret_code') ? $request->secret_code : 'AT61',
        ]);

        $user->roles()->sync($request->roles);

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
        if ($user->hasRole('real-Admin') && auth()->id() !== $user->id) {
            abort(403, 'دسترسی غیرمجاز به کاربر real-Admin');
        }

        $roles = Role::all();
        return view('Admin.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
//    public function update(Request $request, User $user)
//    {
//        $request->validate([
//            'name' => 'required',
//            'email' => 'nullable|email',
//            'mobile' => 'nullable',
//            'role_id' => 'required|exists:roles,id',
//            'avatar' => 'nullable|image|max:2048',
//        ]);
//
//        $user->update([
//            'name' => $request->name,
//            'email' => $request->email,
//            'mobile' => $request->mobile,
//        ]);
//
//        // آپلود تصویر جدید (در صورت وجود)
//        if ($request->hasFile('avatar')) {
//            $filename = time() . '.' . $request->image->extension();
//            $request->image->storeAs('users', $filename, 'public');
//            $user->image = $filename;
//            $user->save();
//        }
//
//        // بروزرسانی نقش
//        $user->roles()->sync([$request->role_id]);
//
//        return redirect()->route('users.index')->with('success', 'کاربر با موفقیت ویرایش شد.');
//    }

//    public function update(Request $request, User $user)
//    {
//        $data = $request->validate([
//            'name'   => 'required|string|max:255',
//            'email'  => 'nullable|email',
//            'mobile' => 'nullable|string|max:20',
//            'role_id'=> 'required|exists:roles,id',
//            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
//            'password' => 'nullable|string|',
//        ]);
//
//        // آپلود آواتار
//        if ($request->hasFile('avatar')) {
//            // حذف قبلی اگر وجود داشت
//            if ($user->avatar && \Storage::disk('public')->exists('users/'.$user->avatar)) {
//                \Storage::disk('public')->delete('users/'.$user->avatar);
//            }
//
//            $fileName = time().'.'.$request->file('avatar')->getClientOriginalExtension();
//            $request->file('avatar')->storeAs('users', $fileName, 'public');
//            $data['avatar'] = $fileName;
//        }
//
//        $user->update($data);
//
//        // نقش
//        $user->roles()->sync([$request->role_id]);
//
//        return redirect()->route('users.index')->with('success','کاربر بروزرسانی شد');
//    }
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'nullable|email',
            'mobile' => 'nullable|string|max:20',
            'role_id'=> 'required|exists:roles,id',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'password' => 'nullable|string|min:6', // می‌توانید طول حداقل مشخص کنید
        ]);

        // آپلود آواتار
        if ($request->hasFile('avatar')) {
            // حذف قبلی اگر وجود داشت
            if ($user->avatar && \Storage::disk('public')->exists('users/'.$user->avatar)) {
                \Storage::disk('public')->delete('users/'.$user->avatar);
            }

            $fileName = time().'.'.$request->file('avatar')->getClientOriginalExtension();
            $request->file('avatar')->storeAs('users', $fileName, 'public');
            $data['avatar'] = $fileName;
        }

        // هش کردن پسورد اگر وارد شده باشد
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            // اگر پسورد خالی بود، از آرایه حذف شود تا آپدیت نشود
            unset($data['password']);
        }

        $user->update($data);

        // بروزرسانی نقش
        $user->roles()->sync([$request->role_id]);

        return redirect()->route('users.index')->with('success','کاربر بروزرسانی شد');
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
