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
    return redirect()->route('login');
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
    Route::get('/panduan', [App\Http\Controllers\Dashboard\PanduanController::class, 'index'])->name('panduan');

    // Admin (for role admin & super-admin)
    Route::prefix('admin')->name('admin.')->middleware(['role:Admin'])->group(function () {
        Route::resource('oauth', App\Http\Controllers\Dashboard\Admin\OAuthController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::resource('roles', App\Http\Controllers\Dashboard\Admin\RolesController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::resource('permissions', App\Http\Controllers\Dashboard\Admin\PermissionController::class)->only(['index', 'store', 'update', 'destroy']);
    });
});

