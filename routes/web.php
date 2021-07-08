<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/login', function () {
    if (session('login')) {
        session()->flash('notif', 'Selamat Datang Kembali' . session('name'));
        session()->flash('type', 'success');
        return redirect(route('admin.dashboard'));
    }
    return view('admin.login');
})->name('admin.login');

Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');

Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::prefix('/admin')->middleware(['adminauth'])->group(function () {

    Route::get('/', function () {
        return view('admin.dashboard', [
            'title'     => 'Dashboard'
        ]);
    })->name('admin.dashboard');

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    
});
