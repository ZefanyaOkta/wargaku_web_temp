<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('/users', function () {
    $users = \App\Models\User::all();
    return json_decode($users);
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login.index');
    Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
    Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register.index');
    Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
    Route::get('/admin/login', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin.login.index');
});

//Admin


Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/kelurahan/{id_kec}', [App\Http\Controllers\Auth\RegisterController::class, 'getKelurahan'])->name('kelurahan');


Route::prefix('dashboard')->name('dashboard.')->middleware(['auth.token'])->group(function () {
    Route::get('/', [App\Http\Controllers\Dashboard\Index::class, 'index'])->name('index');
    Route::get('/account', [App\Http\Controllers\Dashboard\AccountSettingController::class, 'index'])->name('account');
    Route::get('/panduan', [App\Http\Controllers\Dashboard\PanduanController::class, 'index'])->name('panduan');

    // Admin (for role admin & super-admin)
    Route::prefix('admin')->name('admin.')->middleware(['role:Admin', 'auth'])->group(function () {
        Route::resource('oauth', App\Http\Controllers\Dashboard\Admin\OAuthController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::resource('roles', App\Http\Controllers\Dashboard\Admin\RolesController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::resource('permissions', App\Http\Controllers\Dashboard\Admin\PermissionController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::resource('categories', App\Http\Controllers\Dashboard\Admin\CategoryController::class)->only(['index', 'store', 'update', 'destroy']);
    });
});

Route::get('/test-404', function(){
    return view('errors.404');
});