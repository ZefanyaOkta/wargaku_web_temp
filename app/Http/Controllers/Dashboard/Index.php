<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Index extends Controller
{


    public function index(){
        $categories = \App\Models\Category::all();

        return view('pages.dashboard.index', compact('categories'));
    }
}
