<?php

use App\Http\Controllers\Admin\Admin_panel_settingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\TreasuryController;
use Illuminate\Support\Facades\Route;


//===================define consist pagination================================
define('PAGINATION_COUNT', 3);
//============================================================================


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
    Route::group(['prefix' => '/admin-panel-setting'], function () {
        Route::get('/show', [Admin_panel_settingController::class, 'index'])->name('.panel_setting.show');
        Route::get('/edit', [Admin_panel_settingController::class, 'edit'])->name('.panel_setting.edit');
        Route::post('/update', [Admin_panel_settingController::class, 'update'])->name('.panel_setting.update');
    });
//============================.\admin-panel=================================


//===============================treasury===================================
    Route::group(['prefix' => '/treasury'], function () {
        Route::get('/show', [TreasuryController::class, 'index'])->name('.treasury.index');
        Route::get('/create', [TreasuryController::class, 'create'])->name('.treasury.create');
        Route::post('/store', [TreasuryController::class, 'store'])->name('.treasury.store');
        Route::get('/edit/{id}', [TreasuryController::class, 'edit'])->name('.treasury.edit');
        Route::post('/update/{id}', [TreasuryController::class, 'update'])->name('.treasury.update');
        Route::get('/destroy/{id}', [TreasuryController::class, 'destroy'])->name('.treasury.destroy');

        //==========================search button ==============================
        Route::post('/ajax_search', [TreasuryController::class, 'ajax_search'])->name('.treasury.ajax_search');
        //==========================.\search button =============================


    });
//==============================.\treasury==================================


});

//=============================.\admin=======================================
