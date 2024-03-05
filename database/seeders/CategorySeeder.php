<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Pengaduan Masyarakat',
            'Kependudukan',
            'Perizinanan dan Perizinan',
            'Kesehatan',
            'Kios Layanan Publik',
            'Sosial Masayarakat',
            'Pemberdayaan Ekonomi',
            'PPID',
            'Pojok Uang',
            'E-Housing',
            'JDIH Kota Surabaya',
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create([
                'name' => $category,
                'slug' => \Illuminate\Support\Str::slug($category),
                'link' => "#",
                'type' => 'external',
            ]);
        }

    }
}
