<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $Real=Role::query()->create([

            'name'=>'Real-admin',
            'guard_name'=>'web',

        ]);

        $Real->permissions()->attach(Permission::all());


        Role::query()->create([

            'name'=>'user',
            'guard_name'=>'web',
        ]);


    }
}
