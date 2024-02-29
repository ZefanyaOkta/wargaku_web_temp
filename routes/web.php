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
    redirect('/login');
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

Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\Dashboard\Index::class, 'index'])->name('index');
    Route::get('/account', [App\Http\Controllers\Dashboard\AccountSettingController::class, 'index'])->name('account');

    // Admin (for role admin & super-admin)
    Route::prefix('admin')->name('admin.')->middleware(['role:admin'])->group(function () {
        Route::get('/oauth', [App\Http\Controllers\Dashboard\Admin\OAuthController::class, 'index'])->name('oauth');
        Route::post('/oauth', [App\Http\Controllers\Dashboard\Admin\OAuthController::class, 'store'])->name('oauth.store');

        Route::get('/roles', [App\Http\Controllers\Dashboard\Admin\RolesController::class, 'index'])->name('roles');
    });
});

