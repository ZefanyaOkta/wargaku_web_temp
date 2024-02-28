<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = \App\Models\User::factory(10)->create();

        $users->each(function ($user) {
            $user->address()->create([
                'address' => 'Jl. ' . $user->name,
                'kecamatan' => 'Kecamatan ' . $user->name,
                'kelurahan' => 'Kelurahan ' . $user->name,
            ]);
        });
    }
}
