<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            //'link' => 'nullable|string',
            //'type' => 'required|in:internal,external',
        ]);

       if ($request->hasFile('image')) {
            //File name == $request->name . '.' . $request->file('image')->extension();
            $request->file('image')->storeAs('categories', $request->name . '.' . $request->file('image')->extension(), 'public');
        }

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
            'name' => 'required|string|unique:categories,name',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $category = \App\Models\Category::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete old image
            Storage::disk('public')->delete('categories/' . $category->name . '.' . $category->image->extension());
            $request->file('image')->storeAs('categories', $request->name . '.' . $request->file('image')->extension(), 'public');
        }else{
            $newFileName = $request->name . '.' . $category->image->extension();

            $old_file = 'categories/' . $category->name . '.' . $category->image->extension();

            if (Storage::disk('public')->exists($old_file)) {
                Storage::disk('public')->move($old_file, 'categories/' . $newFileName);
            }
        }

        $category->name = $request->name;
        $category->slug = \Illuminate\Support\Str::slug($request->name);
        $category->link = "#";
        $category->save();

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
