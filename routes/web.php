<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StorageLocationController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//ใช้รวม
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/districts/{id}', [AddressController::class, 'districts'])->name('districts');
Route::get('/subdistrict/{id}', [AddressController::class, 'subdistricts'])->name('subdistrict');

// is_drawer ผู้เบิก
/* Route::group(['middleware' => ['is_drawer']], function () {
Route::get('/storage-index', [StorageLocationController::class, 'index'])->name('storage-index');
Route::get('/storage-create', [StorageLocationController::class, 'create'])->name('storage-create');
Route::post('/storage-store', [StorageLocationController::class, 'store'])->name('storage-store');
}); */

// เจ้าหน้าที่วัสดุ หรือ หัวหน้าวัสดุ is_admin is_headAdmin
Route::group(['middleware' => ['is_admin']], function () {
    Route::get('/storage-index', [StorageLocationController::class, 'index'])->name('storage-index');
    Route::get('/storage-create', [StorageLocationController::class, 'create'])->name('storage-create');
    Route::post('/storage-store', [StorageLocationController::class, 'store'])->name('storage-store');
});

//  หัวหน้าวัสดุ  is_headAdmin
/* Route::group(['middleware' => ['is_headAdmin']], function () {
Route::get('/storage-index', [StorageLocationController::class, 'index'])->name('storage-index');
Route::get('/storage-create', [StorageLocationController::class, 'create'])->name('storage-create');
Route::post('/storage-store', [StorageLocationController::class, 'store'])->name('storage-store');
}); */
