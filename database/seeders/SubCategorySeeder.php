<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subCategories = [
            'Kesehatan' => [
                'E-Health',
                'Puskesmas',
                'Pemeriksaan Catin',
            ],
            'Pendidikan' => [
                'PPDB SD',
                'PPDB SMP',
                'PPDB SMA',
            ],
            'Kemiskinan' => [
                'ASSiK',
                'Cek Gamis'
            ],
            'Pengaduan' => [
                'Media Center',
            ],
            'Perizinan' => [
                'SSW Alfa',
                'Klampid',
                'SKM'
            ],
        ];

        foreach ($subCategories as $category => $subCategory) {
            $categoryId = \App\Models\Category::where('name', $category)->first()->id;
            foreach ($subCategory as $sub) {
                \App\Models\SubCategory::create([
                    'category_id' => $categoryId,
                    'name' => $sub,
                    'slug' => Str::slug($sub),
                ]);
            }
        }
    }
}
