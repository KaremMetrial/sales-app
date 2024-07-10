<?php

use App\Http\Controllers\Admin\Admin_panel_settingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\TreasuryController;
use Illuminate\Support\Facades\Route;





//define consist pagination=
define('PAGINATION_COUNT', 5);
//=================================



//===============================guest========================================
Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.show')->middleware('guest');
    Route::post('/login/store', [LoginController::class, 'login'])->name('login');
});
//=============================.\guest========================================



//===============================admin========================================
Route::group(['middleware' => 'auth:admin'], function () {


    Route::get('/', [DashboardController::class, 'index'])->name('.dashboard');
    Route::get('/logout', [LoginController::class, 'logout'])->name('.logout');


//============================admin-panel==================================
    Route::get('/admin-panel-setting/show', [Admin_panel_settingController::class, 'index'])->name('.panel_setting.show');
    Route::get('/admin-panel-setting/edit', [Admin_panel_settingController::class, 'edit'])->name('.panel_setting.edit');
    Route::post('/admin-panel-setting/update', [Admin_panel_settingController::class, 'update'])->name('.panel_setting.update');
//============================.\admin-panel=================================




//===============================treasury===================================
    Route::get('/treasury/show', [TreasuryController::class, 'index'])->name('.treasury.index');
//==============================.\treasury==================================


});

//=============================.\admin=======================================
