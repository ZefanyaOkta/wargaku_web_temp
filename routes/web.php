<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});


Route::get('/client', function (Request $request) {
    return view('client', [
        'clients' => $request->user()->clients
    ]);
});

Route::get('/users', function () {
    $users = \App\Models\User::all();
    return json_decode($users);
});
