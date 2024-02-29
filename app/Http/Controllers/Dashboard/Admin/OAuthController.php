<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OAuthController extends Controller
{
    public function index(Request $request)
    {

        $clients = $request->user()->clients;

        return view('pages.dashboard.admin.oauth', compact('clients'));
    }
}
