<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardMobilController;
use App\Http\Controllers\DashboardOrderController;
use App\Http\Controllers\DashboardPengembalianController;
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
//     return view('home');
// });
Route::get('/', [HomeController::class, 'index']);

Route::get('/home/tersedia', [HomeController::class, 'index_tersedia']);

//Route halaman default yaitu halaman login
Route::get('/login', [LoginController::class, 'index'])->name('login');

//Route autentikasi user
Route::post('/login', [LoginController::class, 'autentikasi']);

//Route Register
Route::get('/register', [RegisterController::class, 'index']);

//Route Register store data
Route::post('/register', [RegisterController::class, 'store']);

//Route Dashboard untuk admin
Route::get('/dashboard', [DashboardController::class, 'index']);


//Route untuk halaman mobil
Route::resource('/dashboard/mobils', DashboardMobilController::class);

//Route untuk halaman peminjaman mobil
Route::resource('/dashboard/orders', DashboardOrderController::class);

//Route untuk halaman pengembalian mobil
Route::resource('/dashboard/pengembalians', DashboardPengembalianController::class);

//halaman single event
Route::get('/dashboard/pengembalians/{mobil:id}',[DashboardMobilController::class,'sewa']);

//Routing logout
Route::post('/logout', [LoginController::class, 'logout']);