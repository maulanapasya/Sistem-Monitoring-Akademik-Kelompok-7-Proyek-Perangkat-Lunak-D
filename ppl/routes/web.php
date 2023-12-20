<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DosenWaliController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PKLController;
use App\Http\Controllers\PKLDosenController;
use App\Http\Controllers\SkripsiController;
use App\Http\Controllers\SkripsiDosenController;
use App\Http\Controllers\KHSController;
use App\Http\Controllers\KHSDosenController;
use App\Http\Controllers\IRSController;
use App\Http\Controllers\IRSDosenController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\MHSController;

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

Route::get('/', [LoginController::class, 'index']);
Route::post('/', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// operator
// Route::get('/dashboardoperator/main', [OperatorController::class, 'index'])->middleware('operator');
Route::get('/dashboardoperator', [OperatorController::class, 'dashboard'])->middleware('operator');
Route::get('/dashboardoperator/addmahasiswa', [OperatorController::class, 'register'])->middleware('operator');
Route::post('/dashboardoperator/addmahasiswa', [OperatorController::class, 'submit'])->middleware('operator');

//department
Route::get('/dashboarddepartment', [DepartmentController::class, 'dashboard'])->middleware('department');
Route::get('/dashboarddepartment/rekappkl', [DepartmentController::class, 'rekap']);
Route::get('/dashboarddepartment/rekapskripsi', [DepartmentController::class, 'create']);

Route::get('/dashboarddepartment/statusmahasiswa', [DepartmentController::class, 'halamanstatusmahasiswa']);
Route::get('/submit/status', [DepartmentController::class, 'statusmahasiswa']);

//list rekap PKL
Route::get('/sudahpkl/{tahun}', [DepartmentController::class, 'sudahpkl'])->name('sudahpkl')->middleware('department');
Route::get('/belumpkl/{tahun}', [DepartmentController::class, 'belumpkl'])->name('belumpkl')->middleware('department');
//list rekap Skripsi
Route::get('/sudahskripsi/{tahun}', [DepartmentController::class, 'sudahskripsi'])->name('sudahskripsi')->middleware('department');
Route::get('/belumskripsi/{tahun}', [DepartmentController::class, 'belumskripsi'])->name('belumskripsi')->middleware('department');

//mahasiswa
Route::get('/update', [MHSController::class, 'index'])->middleware('mhs');
Route::put('/update', [MHSController::class, 'update']);
Route::get('/dashboardmahasiswa', [MHSController::class, 'dashboard'])->middleware('mhs');

//IRS
Route::get('/dashboardmahasiswa/addirs', [IRSController::class, 'index'])->middleware('mhs');
Route::post('/dashboardmahasiswa/addirs', [IRSController::class, 'add']);

//KHS
Route::get('/dashboardmahasiswa/addkhs', [KHSController::class, 'index'])->middleware('mhs');
Route::post('/dashboardmahasiswa/addkhs', [KHSController::class, 'add']);

//PKL
Route::get('/dashboardmahasiswa/addpkl', [PKLController::class, 'index'])->middleware('mhs');
Route::post('/dashboardmahasiswa/addpkl', [PKLController::class, 'add']);

//Skripsi
Route::get('/dashboardmahasiswa/addskripsi', [SkripsiController::class, 'index'])->middleware('mhs');
Route::post('/dashboardmahasiswa/addskripsi', [SkripsiController::class, 'add']);

//Dashboard Dosen
Route::get('/dashboarddosen', [DosenWaliController::class, 'index'])->middleware('dosen');
Route::get('/dashboarddosen', [DosenWaliController::class, 'search'])->middleware('dosen');
Route::get('/dashboarddosen/detail/{nim}', [DosenWaliController::class, 'detail'])->middleware('dosen');

//Verifikasi IRS
Route::get('/dashboarddosen/verifikasiirs', [IRSDosenController::class, 'index'])->middleware('dosen');
Route::get('/dashboarddosen/verifikasiirs/download/{id}', [IRSDosenController::class, 'download'])->middleware('dosen');
Route::post('/dashboarddosen/verifikasiirs/verify/{id}', [IRSDosenController::class, 'changestatus'])->middleware('dosen');
Route::post('/dashboarddosen/verifikasiirs/unverify/{id}', [IRSDosenController::class, 'unchangestatus'])->middleware('dosen');

//Verifikasi KHS
Route::get('/dashboarddosen/verifikasikhs', [KHSDosenController::class, 'index'])->middleware('dosen');
Route::get('/dashboarddosen/verifikasikhs/download/{id}', [KHSDosenController::class, 'download'])->middleware('dosen');
Route::post('/dashboarddosen/verifikasikhs/verify/{id}', [KHSDosenController::class, 'changestatus'])->middleware('dosen');
Route::post('/dashboarddosen/verifikasikhs/unverify/{id}', [KHSDosenController::class, 'unchangestatus'])->middleware('dosen');

//Verifikasi PKL
Route::get('/dashboarddosen/verifikasipkl', [PKLDosenController::class, 'index'])->middleware('dosen');
Route::get('/dashboarddosen/verifikasipkl/download/{id}', [PKLDosenController::class, 'download'])->middleware('dosen');
Route::post('/dashboarddosen/verifikasipkl/verify/{id}', [PKLDosenController::class, 'changestatus'])->middleware('dosen');
Route::post('/dashboarddosen/verifikasipkl/unverify/{id}', [PKLDosenController::class, 'unchangestatus'])->middleware('dosen');

//Verifikasi Skripsi
Route::get('/dashboarddosen/verifikasiskripsi', [SkripsiDosenController::class, 'index'])->middleware('dosen');
Route::get('/dashboarddosen/verifikasiskripsi/download/{id}', [SkripsiDosenController::class, 'download'])->middleware('dosen');
Route::post('/dashboarddosen/verifikasiskripsi/verify/{id}', [SkripsiDosenController::class, 'changestatus'])->middleware('dosen');
Route::post('/dashboarddosen/verifikasiskripsi/unverify/{id}', [SkripsiDosenController::class, 'unchangestatus'])->middleware('dosen');

//Search Mahasiswa
// Route::get('/done/pkl', [DepartmentController::class, 'list_sudah_pkl'])->name('list_sudah_pkl');
// Route::get('/blm/pkl', [DepartmentController::class, 'list_belum_pkl'])->name('list_belum_pkl');