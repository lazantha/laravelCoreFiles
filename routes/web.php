<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::post('/user_login', [AuthController::class, 'login'])->name('u_login');;

// Route::post('/user_logout', [AuthController::class, 'logout'])->name('logout')->middleware('isLogedIn');
// Route::get('/product_v', [AuthController::class, 'product_view'])->name('product')->middleware('isLogedIn');
// Route::get('/home', [AuthController::class, 'userHome'])->name('home')->middleware('isLogedIn');


Route::middleware(['isLogedIn'])->group(function () {
    
    Route::post('/user_logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/product_v', [AuthController::class, 'product_view'])->name('product');
    Route::get('/home', [AuthController::class, 'userHome'])->name('home');
});
