<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\userController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [userController::class, 'index'])->name('signIn');
Route::post('/signin', [userController::class, 'signIn'])->name('signInPost');

Route::get('/main', [dashboardController::class, 'index'])->name('dashboard');

Route::group(['middleware' => ['auth','cekStatus:1']], function() {
});
