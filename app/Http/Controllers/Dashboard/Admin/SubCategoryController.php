<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $categories = \App\Models\Category::with('sub_categories')->get();

        return view('pages.dashboard.admin.sub-categories   ', compact('categories'));
    }
}
