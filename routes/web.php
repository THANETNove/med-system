<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StorageLocationController;
use App\Http\Controllers\PersonnelController;
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
    Route::post('/storage-index', [StorageLocationController::class, 'index'])->name('storage-index');
    Route::get('/storage-create', [StorageLocationController::class, 'create'])->name('storage-create');
    Route::post('/storage-store', [StorageLocationController::class, 'store'])->name('storage-store');
    Route::get('/storage-edit/{id}', [StorageLocationController::class, 'edit'])->name('storage-edit');
    Route::put('/storage-update/{id}', [StorageLocationController::class, 'update'])->name('storage-update');
    Route::get('/storage-destroy/{id}', [StorageLocationController::class, 'destroy'])->name('storage-destroy');
    Route::get('storage-update-status/{id}', [StorageLocationController::class, 'updateStatus'])->name('storage-update-status');
    Route::get('/storage-export/pdf', [StorageLocationController::class, 'exportPDF'])->name('export/pdf');


    Route::get('personnel-index', [PersonnelController::class, 'index'])->name('personnel-index');
    Route::get('personnel-create', [PersonnelController::class, 'create'])->name('personnel-create');
    Route::get('personnel-show/{id}', [PersonnelController::class, 'show'])->name('personnel-show');
    Route::get('personnel-edit/{id}', [PersonnelController::class, 'edit'])->name('personnel-edit');
    Route::post('personnel-store', [PersonnelController::class, 'store'])->name('personnel-store');
    Route::put('personnel-update/{id}', [PersonnelController::class, 'update'])->name('personnel-update');
    Route::get('personnel-destroy/{id}', [PersonnelController::class, 'destroy'])->name('personnel-destroy');
    Route::get('personnel-update-status/{id}', [PersonnelController::class, 'updateStatus'])->name('personnel-update-status');
    Route::get('personnel-export/pdf', [PersonnelController::class, 'exportPDF'])->name('personnel-export/pdf');
});

//  หัวหน้าวัสดุ  is_headAdmin
/* Route::group(['middleware' => ['is_headAdmin']], function () {
Route::get('/storage-index', [StorageLocationController::class, 'index'])->name('storage-index');
Route::get('/storage-create', [StorageLocationController::class, 'create'])->name('storage-create');
Route::post('/storage-store', [StorageLocationController::class, 'store'])->name('storage-store');
}); */
