<?php

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
    return view('welcome');
});


Route::get('/admin/login', function () {
    return view('admin.auth.auth');
});

Route::post('/admin/login',
    [\App\Http\Controllers\admin\AuthController::class, 'login']
    )->name("auth.perform");

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/dashboard', [\App\Http\Controllers\admin\DashboardController::class, 'index']
    )->name('dashboard');

    Route::get('/admin/profile/{id?}', [\App\Http\Controllers\admin\ProfileController::class, 'index']
    )->name('profile');
});
