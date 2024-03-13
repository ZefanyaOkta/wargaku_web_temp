<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public $menus;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->menus = $this->createMenus();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar');
    }

    public function createMenus()
    {
        // Menu Attributr : title, icon, href

        //Permission : menu-"menu name", Example : menu-roles, menu-permissions

        $permission = [
            'roles' => 'menu-roles',
            'permissions' => 'menu-permissions',
            'oauth' => 'menu-oauth',
        ];

        //Guest Menu: Beranda, Akun, Pengumuman
        $main_menus = [];

        if(auth()->guard('web')->check()){
            auth()->user()->can('menu-roles') ? array_push($main_menus, [
            'title' => 'Roles',
            'icon' => 'fa-solid fa-users',
            'href' => "dashboard.admin.roles.index"
        ]) : null;

        auth()->user()->can('menu-permissions') ? array_push($main_menus, [
            'title' => 'Permissions',
            'icon' => 'fa-solid fa-lock',
            'href' => "dashboard.admin.permissions.index"
        ]) : null;

        auth()->user()->can('menu-oauth') ? array_push($main_menus, [
            'title' => 'OAuth',
            'icon' => 'fa-solid fa-cog',
            'href' => "dashboard.admin.oauth.index"
        ]) : null;

        auth()->user()->can('menu-kategori') ? array_push($main_menus, [
            'title' => 'Kategori',
            'icon' => 'fa-solid fa-cog',
            'sub_menu' => [
                ['title' => 'Kategori Utama', 'href' => 'dashboard.admin.categories.index'],
                ['title' => 'Sub-Kategori', 'href' => 'dashboard.admin.sub-categories.index']
            ]
        ]) : null;
        }


        return $main_menus;
    }
}
