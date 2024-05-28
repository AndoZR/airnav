<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\akunController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\admin\testController;
use App\Http\Controllers\admin\airportController;
use App\Http\Controllers\admin\artikelController;
use App\Http\Controllers\admin\penggunaController;
use App\Http\Controllers\admin\dashboardController;
use App\Http\Controllers\admin\organisasiController;
use App\Http\Controllers\admin\elogbookController;
use App\Http\Controllers\pengguna\berandaController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['guest'])->group(function () {
    Route::post('/signin', [loginController::class, 'signIn'])->name('signInPost');
    Route::get('/', [loginController::class, 'index'])->name('signIn');
});

Route::match(['get','post'],'auth',[loginController::class,'auth'])->name('authentication');
Route::get('logout', [loginController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'cekStatus:1'], function () {
    Route::get('/main', [dashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'adminAkun', 'as' => 'adminAkun.'], function () {
        Route::get('/', [dashboardController::class, 'akun'])->name('index');
        Route::post('/edit', [dashboardController::class, 'edit'])->name('edit');
    });

    Route::group(['prefix' => 'artikel', 'as' => 'artikel.'], function () {
        Route::get('/', [artikelController::class, 'indexArtikel'])->name('index');
        Route::post('/store', [artikelController::class, 'storeArtikel'])->name('store');
        Route::get('/editor', [artikelController::class, 'editorArtikel'])->name('editor');
        Route::post('/preview', [artikelController::class, 'previewArtikel'])->name('preview');
        Route::post('/publish', [artikelController::class, 'publishArtikel'])->name('publish');
        Route::post('/update/{id}', [artikelController::class, 'updateArtikel'])->name('update');
        Route::get('/delete/{id}', [artikelController::class, 'deleteArtikel'])->name('delete');
    });

    Route::group(['prefix' => 'airport', 'as' => 'airport.'], function () {
        Route::get('', [airportController::class, 'index'])->name('index');
        Route::post('/store', [airportController::class, 'storeAirport'])->name('store');
        Route::post('/update/{id}', [airportController::class, 'updateAirport'])->name('update');
        Route::get('/delete/{id}', [airportController::class, 'deleteAirport'])->name('delete');
    });

    Route::group(['prefix' => 'test', 'as' => 'test.'], function () {
        Route::get('', [testController::class, 'index'])->name('index');
        Route::post('/store', [testController::class, 'storeTest'])->name('store');
        Route::post('/update/{id}', [testController::class, 'updateTest'])->name('update');
        Route::get('/delete/{id}', [testController::class, 'deleteTest'])->name('delete');
        Route::post('/active/{id}', [testController::class, 'activeTest'])->name('active');

        Route::group(['prefix' => 'soal', 'as' => 'soal.'], function () {
            Route::get('{id}', [testController::class, 'soalIndex'])->name('soalIndex');
            Route::get('/jawaban/{id}', [testController::class, 'getJawaban'])->name('getJawaban');
            Route::post('/store/{id}', [testController::class, 'storeSoal'])->name('store');
            Route::post('/update/{id}', [testController::class, 'updateSoal'])->name('update');
            Route::get('/delete/{id}', [testController::class, 'deleteSoal'])->name('delete');
        });
    });

    Route::group(['prefix' => 'pengguna', 'as' => 'pengguna.'], function () {
        Route::get('/', [penggunaController::class, 'index'])->name('index');
        Route::post('/store', [penggunaController::class, 'storePengguna'])->name('store');
        Route::post('/update/{id}', [penggunaController::class, 'updatePengguna'])->name('update');
        Route::get('/delete/{id}', [penggunaController::class, 'deletePengguna'])->name('delete');
    });

    Route::group(['prefix' => 'organisasi', 'as' => 'organisasi.'], function () {
        Route::get('/', [organisasiController::class, 'airport'])->name('airport');
        Route::get('/divisi/{id}', [organisasiController::class, 'divisi'])->name('divisi');
        Route::post('/divisi/store', [organisasiController::class, 'storeDivisi'])->name('divisi.store');
        Route::post('/divisi/update/{id}', [organisasiController::class, 'updateDivisi'])->name('divisi.update');
        Route::get('/divisi/delete/{id}', [organisasiController::class, 'deleteDivisi'])->name('divisi.delete');

        Route::get('/karyawan', [organisasiController::class, 'karyawan'])->name('karyawan');
        Route::post('/karyawan/store', [organisasiController::class, 'storekaryawan'])->name('karyawan.store');
        Route::post('/karyawan/update/{id}', [organisasiController::class, 'updatekaryawan'])->name('karyawan.update');
        Route::get('/karyawan/delete/{id}', [organisasiController::class, 'deletekaryawan'])->name('karyawan.delete');

        Route::get('/posisi', [organisasiController::class, 'posisiIndex'])->name('posisiIndex');
        Route::post('/posisi/store', [organisasiController::class, 'storePosisi'])->name('storePosisi');
        Route::post('/posisi/update/{id}', [organisasiController::class, 'updatePosisi'])->name('updatePosisi');
        Route::get('posisi/delete/{id}', [organisasiController::class, 'deletePosisi'])->name('deletePosisi');
    });
});

Route::group(['middleware' => 'cekStatus:2'], function () {
    Route::group(['prefix' => 'beranda', 'as' => 'beranda.'], function () {
        Route::get('/', [berandaController::class, 'index'])->name('index');
        Route::get('/artikel', [berandaController::class, 'artikel'])->name('artikel');
        Route::get('/artikel/{id}', [berandaController::class, 'detailArtikel'])->name('detailArtikel');
        Route::get('/pembelajaran', [berandaController::class, 'pembelajaran'])->name('pembelajaran');

        Route::get('/HangNadim_ATS', [berandaController::class, 'HangNadim_ATS'])->name('HangNadim_ATS');
        Route::get('/HangNadim_CNS', [berandaController::class, 'HangNadim_CNS'])->name('HangNadim_CNS');
        Route::get('/HangNadim_Penunjang', [berandaController::class, 'HangNadim_Penunjang'])->name('HangNadim_Penunjang');
        Route::get('/HangNadim_LOCA', [berandaController::class, 'HangNadim_LOCA'])->name('HangNadim_LOCA');
        Route::get('/HangNadim_TeamChecker', [berandaController::class, 'HangNadim_TeamChecker'])->name('HangNadim_TeamChecker');

        Route::get('/logbook', [berandaController::class, 'elogbook'])->name('elogbook');
        Route::get('/logbook/form', [berandaController::class, 'elogbookForm'])->name('elogbook.form');
    });
    Route::group(['prefix' => 'test', 'as' => 'test.'], function () {
        Route::get('/listUjian', [testController::class, 'userIndex'])->name('userIndex');
        Route::get('/mulai/{id}', [testController::class, 'mulai'])->name('mulai');
        Route::post('/selesai/{id}', [testController::class, 'selesai'])->name('selesai');
    });

    Route::group(['prefix' => 'logbook', 'as' => 'logbook.'], function () {
    });

    Route::group(['prefix' => 'akun', 'as' => 'akun.'], function () {
        Route::get('/', [akunController::class, 'index'])->name('index');
        Route::post('/edit', [akunController::class, 'edit'])->name('edit');
    });
});
