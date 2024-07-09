<?php

use App\Http\Controllers\Admin\Admin_panel_settingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Route;

//
//Route::group(['middleware' => 'auth:admin'], function () {
//    Route::get('/dashboard', function () {
//        return view('admin.admin');
//    })->name('dashboard');
//});
Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.show')->middleware('guest');
    Route::post('/login/store', [LoginController::class, 'login'])->name('login');
});

Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('.dashboard');
    Route::get('/admin-panel-setting/show', [Admin_panel_settingController::class, 'index'])->name('.panel_setting.show');
    Route::get('/admin-panel-setting/edit', [Admin_panel_settingController::class, 'edit'])->name('.panel_setting.edit');
    Route::post('/admin-panel-setting/update', [Admin_panel_settingController::class, 'update'])->name('.panel_setting.update');
    Route::get('/logout', [LoginController::class, 'logout'])->name('.logout');
});

