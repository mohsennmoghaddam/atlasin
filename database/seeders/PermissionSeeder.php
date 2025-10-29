<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // همه‌ی پرمیشن‌ها (append-only؛ اگر وجود داشته باشد، فقط عنوان و زمان به‌روزرسانی می‌شود)
        $permissions = [
            // پنل / پروفایل
            ['name' => 'show-panel',      'guard_name' => 'مشاهده پنل ادمین',     'created_at'=>$now, 'updated_at'=>$now],
            ['name' => 'show-profile',    'guard_name' => 'مشاهده پروفایل',       'created_at'=>$now, 'updated_at'=>$now],

            // داشبورد و توسعه‌دهندگان و بلاگ (نمایش ماژول)
            ['name' => 'view-dashboard',  'guard_name' => 'مشاهده داشبورد',       'created_at'=>$now, 'updated_at'=>$now],
            ['name' => 'view-developers', 'guard_name' => 'مشاهده توسعه‌دهندگان', 'created_at'=>$now, 'updated_at'=>$now],
            ['name' => 'view-blog',       'guard_name' => 'مشاهده ماژول بلاگ',    'created_at'=>$now, 'updated_at'=>$now], // درصورت تمایل

            // کاربران / نقش‌ها / دسترسی‌ها
            ['name' => 'user-see',        'guard_name' => 'مشاهده کاربران',       'created_at'=>$now, 'updated_at'=>$now],
            ['name' => 'read-role',       'guard_name' => 'مشاهده نقش',           'created_at'=>$now, 'updated_at'=>$now],
            ['name' => 'create-role',     'guard_name' => 'ایجاد نقش',            'created_at'=>$now, 'updated_at'=>$now],
            ['name' => 'update-role',     'guard_name' => 'ویرایش نقش',           'created_at'=>$now, 'updated_at'=>$now],
            ['name' => 'delete-role',     'guard_name' => 'حذف نقش',              'created_at'=>$now, 'updated_at'=>$now],
            ['name' => 'create-permission','guard_name'=> 'ایجاد دسترسی',          'created_at'=>$now, 'updated_at'=>$now],
            ['name' => 'permission-edit', 'guard_name' => 'ویرایش دسترسی',        'created_at'=>$now, 'updated_at'=>$now],

            // بلاگ (CRUD + اختیاری: انتشار/نمایش)
            ['name' => 'blog-show',       'guard_name' => 'نمایش وبلاگ',          'created_at'=>$now, 'updated_at'=>$now], // اگر ازش استفاده می‌کنی
            ['name' => 'read-blog',       'guard_name' => 'مشاهده مطالب وبلاگ',   'created_at'=>$now, 'updated_at'=>$now],
            ['name' => 'create-blog',     'guard_name' => 'ایجاد مطالب وبلاگ',    'created_at'=>$now, 'updated_at'=>$now],
            ['name' => 'update-blog',     'guard_name' => 'ویرایش مطالب وبلاگ',   'created_at'=>$now, 'updated_at'=>$now],
            ['name' => 'delete-blog',     'guard_name' => 'حذف مطالب وبلاگ',      'created_at'=>$now, 'updated_at'=>$now],
            // ['name' => 'blog-publish',  'guard_name' => 'انتشار وبلاگ',         'created_at'=>$now, 'updated_at'=>$now], // اگر نیاز داشتی، باز کن

            // سکشن‌ها
            ['name' => 'view-section-hospital', 'guard_name' => 'مشاهده بخش بیمارستانی', 'created_at'=>$now, 'updated_at'=>$now],
            ['name' => 'view-section-home',     'guard_name' => 'مشاهده بخش خانگی',      'created_at'=>$now, 'updated_at'=>$now],
        ];

        // اگر unique index روی name داری، upsert امن‌ترینه
        Permission::query()->upsert($permissions, ['name'], ['guard_name','updated_at']);
    }
}
