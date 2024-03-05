<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = \App\Models\User::factory()->create(
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com'
            ]
        );

        $admin->assignRole('Admin');

        // $superAdmin = \App\Models\User::factory()->create(
        //     [
        //         'name' => 'Super Admin',
        //         'email' => 'superadmin@gmail.com'
        //     ]
        // );

        // $superAdmin->assignRole('Super-Admin');
    }
}
