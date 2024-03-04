<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class RolesController extends Controller
{

    public function __construct()
    {
       $this->authorizeResource(Role::class, 'roles');
    }


    public function index(Request $request)
    {

        return view('pages.dashboard.admin.roles');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'permissions' => 'array',
        ]);

        if(!$request->permissions) {
            $request->permissions = [];
        }

        $role = Role::create(['name' => $request->name]);

        foreach ($request->permissions as $id) {
            $permission = \Spatie\Permission\Models\Permission::find($id);
            $role->givePermissionTo($permission->name);
        }

        return redirect()->route('dashboard.admin.roles.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();

        return redirect()->route('dashboard.admin.roles.index');
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();

        return redirect()->route('dashboard.admin.roles.index');
    }
}
