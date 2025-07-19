<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * panel admin Permission
         */

        Permission::query()->insert([
            [
                'name'=>'show-panel',
                'guard_name'=>'مشاهده پنل ادمین',
            ],
            [
                'name'=>'show-profile',
                'guard_name'=>'مشاهده پروفایل',

            ]

        ]);


        /**
         * role Permission
         */

        Permission::query()->insert([
            [
                'name'=> 'read-role',
                'guard_name'=>'مشاهده نقش'
            ],
            [
                'name'=> 'create-role',
                'guard_name'=>'ایجاد نقش'
            ],
            [
                'name'=> 'update-role',
                'guard_name'=>'ویرایش نقش'
            ],
            [
                'name'=> 'delete-role',
                'guard_name'=>'حذف نقش'
            ],
        ]);


        /**
         *
         */

        Permission::query()->insert([
            [
                'name'=> 'user-see',
                'guard_name'=>'مشاهده کاربران'
            ],
            [
                'name'=> 'create-permission',
                'guard_name'=>'ایجاد دسترسی'
            ],
            [
                'name'=> 'permission-edit',
                'guard_name'=>'ویرایش دسترسی'
            ],
        ]);


        /**
         * Blog Permission
         */

        Permission::query()->insert([
            [
                'name'=> 'read-blogs',
                'guard_name'=>'مشاهده مطالب وبلاگ '
            ],
            [
                'name'=> 'create-blogs',
                'guard_name'=>'ایجاد مطالب وبلاگ '
            ],
            [
                'name'=> 'update-blogs',
                'guard_name'=>'ویرایش مطالب وبلاگ'
            ],
            [
                'name'=> 'delete-blogs',
                'guard_name'=>'حذف مطالب وبلاگ'
            ],
        ]);

    }
}
