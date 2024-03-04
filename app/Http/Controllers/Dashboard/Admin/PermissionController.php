<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('lihat permissions', Permission::class);

        return view('pages.dashboard.admin.permissions');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('tambah permissions', Permission::class);

        $request->validate([
            'name' => 'required',
        ]);

        $role = Permission::create(['name' => $request->name]);

        return redirect()->route('dashboard.admin.permissions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('edit permissions', Permission::class);

        $request->validate([
            'name' => 'required',
        ]);

        $permission = Permission::find($id);
        $permission->name = $request->name;
        $permission->save();

        return redirect()->route('dashboard.admin.permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('hapus permissions', Permission::class);

        $permission = Permission::find($id);
        $permission->delete();

        return redirect()->route('dashboard.admin.permissions.index');
    }
}
