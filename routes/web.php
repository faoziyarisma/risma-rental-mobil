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

//Route validasi tanggal sewa
Route::get('/validate_date', [DashboardOrderController::class, 'validate_date'])->name('validate_date');

//Route validasi data pengembalian
Route::post('/dashboard/pengembalians/update_status', [DashboardPengembalianController::class, 'update_status']);

//halaman form pengembalian mobil
Route::get('/dashboard/pengembalians_form/{pengembalian:id}',[DashboardPengembalianController::class,'pengembalian_form']);

//Route untuk halaman pengembalian mobil
Route::resource('/dashboard/pengembalians', DashboardPengembalianController::class);

//Route validasi nomor plat
Route::get('/validate_NoPlat', [DashboardPengembalianController::class, 'validate_NoPlat'])->name('validate_NoPlat');



//Routing logout
Route::post('/logout', [LoginController::class, 'logout']);