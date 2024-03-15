<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['Kesehatan', 'kesehatan.svg'],
            ['Pendidikan', 'pendidikan.svg'],
            ['Kemiskinan', 'kemiskinan.svg'],
            ['Pengaduan', 'pengaduan.svg'],
            ['Perizinan', 'perizinan.svg'],
        ];


        foreach ($categories as $category) {
            //Clear storage /icon
            Storage::disk('public')->delete('icon/'.$category[1]);

            //Upload image to storage
            Storage::disk('public')->put('icon/'.$category[1], file_get_contents(public_path('images/icon/'.$category[1])));

            \App\Models\Category::create([
                'name' => $category[0],
                'icon' => $category[1],
            ]);
        }

    }
}
