<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.dashboard.admin.roles');
    }
}
