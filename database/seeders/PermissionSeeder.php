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
        Permission::create(['name' => 'lihat roles permissions']);
        Permission::create(['name' => 'tambah roles']);
        Permission::create(['name' => 'edit roles']);
        Permission::create(['name' => 'hapus roles']);

        //OAuth configuration permissions
        Permission::create(['name' => 'menu-oauth']);
        Permission::create(['name' => 'lihat konfigurasi oauth']);
        Permission::create(['name' => 'tambah konfigurasi oauth']);
        Permission::create(['name' => 'edit konfigurasi oauth']);
        Permission::create(['name' => 'hapus konfigurasi oauth']);

        //Permissions permissions
        Permission::create(['name' => 'menu-permissions']);
        Permission::create(['name' => 'lihat permissions']);
        Permission::create(['name' => 'tambah permissions']);
        Permission::create(['name' => 'edit permissions']);
        Permission::create(['name' => 'hapus permissions']);

        //Category permissions
        Permission::create(['name' => 'menu-katagori']);
        Permission::create(['name' => 'lihat katagori']);
        Permission::create(['name' => 'tambah katagori']);
        Permission::create(['name' => 'edit katagori']);
        Permission::create(['name' => 'hapus katagori']);


        $admin = Role::where('name', 'Admin')->first();

        $admin->givePermissionTo([
            'menu-roles',
            'lihat roles',
            'lihat roles permissions',
            'tambah roles',
            'edit roles',
            'hapus roles',
            'menu-oauth',
            'lihat konfigurasi oauth',
            'tambah konfigurasi oauth',
            'edit konfigurasi oauth',
            'hapus konfigurasi oauth',
            'menu-permissions',
            'lihat permissions',
            'tambah permissions',
            'edit permissions',
            'hapus permissions',
            'menu-katagori',
            'lihat katagori',
            'tambah katagori',
            'edit katagori',
            'hapus katagori',
        ]);
    }
}
