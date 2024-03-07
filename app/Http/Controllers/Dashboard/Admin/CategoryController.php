<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $this->authorize('lihat kategori', \App\Models\Category::class);

        return view('pages.dashboard.admin.categories');
    }

    public function store(Request $request)
    {
        $this->authorize('tambah kategori', \App\Models\Category::class);

        $request->validate([
            'name' => 'required|string',
            //'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            //'link' => 'nullable|string',
            //'type' => 'required|in:internal,external',
        ]);

       // if ($request->hasFile('image')) {
           // $data['image'] = $request->file('image')->store('categories', 'public');
       // }

        $category = \App\Models\Category::create([
            'name' => $request->name,
            'slug' => \Illuminate\Support\Str::slug($request->name),
            'link' => "#",
            ]);

        return redirect()->route('dashboard.admin.categories.index')->with('success', 'Category created successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique:categories,slug,' . $id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'nullable|string',
            'type' => 'required|in:internal,external',
        ]);

        $category = \App\Models\Category::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('categories', 'public');
        }

        $category->update($data);

        return redirect()->route('dashboard.admin.categories.index')->with('success', 'Category updated successfully');
    }


    public function destroy($id)
    {
        $this->authorize('hapus kategori', \App\Models\Category::class);

        $category = \App\Models\Category::findOrFail($id);
        $category->delete();

        return redirect()->route('dashboard.admin.categories.index')->with('success', 'Category deleted successfully');
    }
}
