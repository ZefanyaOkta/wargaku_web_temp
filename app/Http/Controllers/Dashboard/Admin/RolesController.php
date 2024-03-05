<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class RolesController extends Controller
{

    // public function __construct()
    // {
    //    $this->authorizeResource(Role::class, 'roles');
    // }


    public function index(Request $request)
    {
        $this->authorize('lihat roles', Role::class);

        return view('pages.dashboard.admin.roles');
    }

    public function store(Request $request)
    {
        $this->authorize('tambah roles', Role::class);

        $request->validate([
            'name' => 'required',
            'permissions' => 'array',
        ]);

        if (!$request->permissions) {
            $request->permissions = [];
        }

        $role = Role::create(['name' => $request->name]);

        $role->syncPermissions($request->permissions);

        return redirect()->route('dashboard.admin.roles.index');
    }

    public function update(Request $request, $id)
    {
        $this->authorize('edit roles', Role::class);

        $request->validate([
            'name' => 'required',
            'permissions' => 'array',
        ]);

        if (!$request->permissions) {
            $request->permissions = [];
        }

        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();

        $role->syncPermissions($request->permissions);



        return redirect()->route('dashboard.admin.roles.index');
    }

    public function destroy($id)
    {
        $this->authorize('hapus roles', Role::class);

        $role = Role::find($id);
        $role->delete();

        return redirect()->route('dashboard.admin.roles.index');
    }
}
