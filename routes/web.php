<?php

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
//     return view('login');
// });

Route::group(['middleware' => 'guest'], function() {
    Route::get('',[]);
});

route::group(['prefix' => 'signin', 'as' => 'signin.'], function() {
    route::get('/', [userController::class, 'index'])->name('index');
    route::post('store', [userController::class, 'signIn'])->name('store');
});