<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            $now = now();

            // 1) مطمئن شو پرمیشن‌های لازم وجود دارند (با عناوین فارسی در guard_name)
            $ensurePermissions = [
                // عمومی/پنل
                'show-panel'             => 'مشاهده پنل ادمین',
                'show-profile'           => 'مشاهده پروفایل',

                // کاربران/نقش‌ها/دسترسی‌ها
                'user-see'               => 'مشاهده کاربران',
                'read-role'              => 'مشاهده نقش',
                'create-role'            => 'ایجاد نقش',
                'update-role'            => 'ویرایش نقش',
                'delete-role'            => 'حذف نقش',
                'create-permission'      => 'ایجاد دسترسی',
                'permission-edit'        => 'ویرایش دسترسی',

                // بلاگ (اسلاگ‌ها را با دیتای موجود هماهنگ کردم: read-blog, create-blog, ...)
                'read-blog'              => 'مشاهده مطالب وبلاگ',
                'create-blog'            => 'ایجاد مطالب وبلاگ',
                'update-blog'            => 'ویرایش مطالب وبلاگ',
                'delete-blog'            => 'حذف مطالب وبلاگ',
                'blog-show'              => 'نمایش ماژول وبلاگ',     // اگر داری
                'blog-publish'           => 'انتشار وبلاگ',         // اگر داری

                // سکشن‌ها (اگر هنوز نداری، ساخته می‌شود)
                'view-section-hospital'  => 'مشاهده بخش بیمارستانی',
                'view-section-home'      => 'مشاهده بخش خانگی',

                // توسعه‌دهندگان (اختیاری، اگر می‌خواهی)
                'view-developers'        => 'مشاهده توسعه‌دهندگان',
            ];

            foreach ($ensurePermissions as $name => $label) {
                Permission::firstOrCreate(
                    ['name' => $name],
                    ['guard_name' => $label, 'created_at' => $now, 'updated_at' => $now]
                );
            }

            // برای lookup سریع
            $permIdsByName = Permission::whereIn('name', array_keys($ensurePermissions))
                ->pluck('id', 'name');

            // 2) رول‌ها
            $roles = [
                'Real-Admin',
                'Admin',
                'moderator',
                'manager-hospital',
                'hospital-user',
                'manager-home',
                'home-user',
                'user',
            ];
            foreach ($roles as $r) {
                Role::firstOrCreate(
                    ['name' => $r, 'guard_name' => 'web'],
                    ['created_at' => $now, 'updated_at' => $now]
                );
            }

            // 3) مپ نقش ← پرمیشن‌ها (طبق خواسته‌ات)
            $map = [
                // فقط ادمین داشبورد و بلاگ را ببیند (در صورت نیاز CRUD بلاگ را هم به او دادم)
                'Admin'             => ['show-panel', 'blog-show', 'read-blog', 'create-blog', 'update-blog', 'delete-blog'],

                // مدبران: کاربران
                'moderator'         => ['user-see'],

                // بخش‌ها
                'manager-hospital'  => ['view-section-hospital'],
                'hospital-user'     => ['view-section-hospital'],

                'manager-home'      => ['view-section-home'],
                'home-user'         => ['view-section-home'],

                // user عادی: بدون پرمیشن خاص
            ];

            // اتصال «اضافه‌ای» (چیزی پاک نمی‌کنیم)
            foreach ($map as $roleName => $permNames) {
                $role = Role::where('name', $roleName)->first();
                if (!$role) continue;

                $ids = collect($permNames)
                    ->map(fn($n) => $permIdsByName[$n] ?? null)
                    ->filter()
                    ->values()
                    ->all();

                // اضافه بدون detach
                $role->permissions()->syncWithoutDetaching($ids);
            }

            // Real-Admin: همه‌ی پرمیشن‌ها
            if ($real = Role::where('name','Real-Admin')->first()) {
                $real->permissions()->syncWithoutDetaching(
                    Permission::pluck('id')->all()
                );
            }
        });
    }
}
