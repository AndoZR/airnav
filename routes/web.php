<?php

use App\Http\Controllers\akunController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\penggunaController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\pengguna\berandaController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [loginController::class, 'index'])->name('signIn');
Route::post('/signin', [loginController::class, 'signIn'])->name('signInPost');
Route::get('logout', [loginController::class, 'logout'])->name('logout');


Route::group(['middleware' => 'cekStatus:1'], function() {
    Route::get('/main', [dashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'adminAkun', 'as' => 'adminAkun.'], function () {
        Route::get('/',[dashboardController::class, 'akun'])->name('index');
        Route::post('/edit',[dashboardController::class, 'edit'])->name('edit');
    });

    Route::group(['prefix' => 'pengguna', 'as' => 'pengguna.'], function () {
        Route::get('/', [penggunaController::class, 'index'])->name('index');
        Route::post('/store', [penggunaController::class, 'storePengguna'])->name('store');
        Route::post('/update/{id}', [penggunaController::class, 'updatePengguna'])->name('update');
        Route::get('/delete/{id}', [penggunaController::class, 'deletePengguna'])->name('delete');
    });
});

Route::group(['middleware' => 'cekStatus:2'], function () {
    Route::group(['prefix' => 'beranda', 'as' => 'beranda.'], function () {
        Route::get('/', [berandaController::class, 'index'])->name('index');
    });

    Route::group(['prefix' => 'akun', 'as' => 'akun.'], function () {
        Route::get('/', [akunController::class, 'index'])->name('index');
        Route::post('/edit',[akunController::class, 'edit'])->name('edit');
    });
});