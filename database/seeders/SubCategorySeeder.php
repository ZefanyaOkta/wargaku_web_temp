<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
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
                ['E-Health', 'E-Health.jpg'],
                ['Puskesmas', 'Puskesmas.jpg'],
                ['Pemeriksaan Catin', 'Pemeriksaan Catin.jpg'],
            ],
            'Pendidikan' => [
                ['PPDB SD', null],
                ['PPDB SMP', null],
                ['PPDB SMA', null],
            ],
            'Kemiskinan' => [
                ['ASSiK', 'ASSiK.jpg'],
                ['Cek Gamis', 'Cek Gamis.jpg']
            ],
            'Pengaduan' => [
                ['Media Center', 'Media Center.jpg'],
            ],
            'Perizinan' => [
                ['SSW Alfa', null],
                ['Klampid', 'Klampid.jpg'],
                ['SKM', 'SKM.jpg']
            ],
        ];

        foreach ($subCategories as $category => $subCategory) {
            $categoryId = \App\Models\Category::where('name', $category)->first()->id;
            foreach ($subCategory as $sub) {
                ///Image upload
                if ($sub[1]) {
                    Storage::disk('public')->delete('sub_categories/'.$sub[1]);
                    Storage::disk('public')->put('sub_categories/'.$sub[1], file_get_contents(public_path('images/categories/'.$sub[1])));
                }

                \App\Models\SubCategory::create([
                    'category_id' => $categoryId,
                    'name' => $sub[0],
                    'slug' => Str::slug($sub[0]),
                    'image' => $sub[1]
                ]);
            }
        }
    }
}
