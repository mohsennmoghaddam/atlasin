<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $RealAdmin = User::query()->create([

            'role_id'=> Role::query()->where('name' , 'Real-admin')->first()->id,

            'mobile' => '09104014271',

            'password' => bcrypt('mohsen7879')

        ]);

        $RealAdmin2 = User::query()->create([

            'role_id'=> Role::query()->where('name' , 'Real-admin')->first()->id ,

            'mobile' => '09121092478',

            'password' => bcrypt('Alireza6985')
        ]);
    }
}
