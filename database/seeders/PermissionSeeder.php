<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //roles permissions
        Permission::create(['name' => 'menu-roles']);
        Permission::create(['name' => 'lihat roles']);
        Permission::create(['name' => 'tambah roles']);
        Permission::create(['name' => 'edit roles']);
        Permission::create(['name' => 'hapus roles']);

        //OAuth configuration permissions
        Permission::create(['name' => 'menu-OAuth']);
        Permission::create(['name' => 'akses konfigurasi OAuth']);
        Permission::create(['name' => 'tambah konfigurasi OAuth']);
        Permission::create(['name' => 'edit konfigurasi OAuth']);
        Permission::create(['name' => 'hapus konfigurasi OAuth']);


        $admin = Role::where('name', 'admin')->first();

        $admin->givePermissionTo([
            'menu-roles',
            'lihat roles',
            'tambah roles',
            'edit roles',
            'hapus roles',
            'menu-OAuth',
            'akses konfigurasi OAuth',
            'tambah konfigurasi OAuth',
            'edit konfigurasi OAuth',
            'hapus konfigurasi OAuth',
        ]);
    }
}
