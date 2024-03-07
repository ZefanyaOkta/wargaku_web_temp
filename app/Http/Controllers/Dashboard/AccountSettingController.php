<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountSettingController extends Controller
{
    public function index()
    {
        $user = auth()->user() ?? session('user');

        return view('pages.dashboard.account', compact('user'));
    }
}
