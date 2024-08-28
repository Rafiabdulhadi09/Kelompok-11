<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DataKelasController;

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
 Route::get('/kelas', function () {
    return view('kelas');
});
Route::middleware(['guest'])->group(function(){
   
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});
Route::middleware(['auth'])->group(function(){
Route::get('/user',[AdminController::class,'index'])->middleware('userAkses:user');
Route::get('/trainer',[AdminController::class,'trainer'])->middleware('userAkses:trainer');
Route::get('/admin',[AdminController::class,'admin'])->middleware('userAkses:admin');
Route::get('/logout', [LoginController::class,'logout']);
});
Route::get('/register', [RegisterController::class, 'register']);
Route::post('/register/create', [RegisterController::class, 'create']);

Route::get('/user/kelas',[DataKelasController::class,'index']);

Route::get('/create/kelas',[DataKelasController::class,'kelas']);

Route::get('admin/Datauser', function () {
    return view('admin.DataUser');
});
Route::get('admin/DataGuru', function () {
    return view('admin.DataGuru');
});
Route::get('admin/DataKelas', function () {
    return view('admin.DataKelas');
});
Route::get('user/profil', function () {
    return view('user.profil');
});

Route::get('/admin/DataUser', [UserController::class, 'index'])->name('admin.datauser');
// Menampilkan form edit pengguna
Route::get('/admin/data-user/{user}/edit', [UserController::class, 'edit'])->name('admin.dataUser.edit');

// Memperbarui pengguna
Route::put('/admin/data-user/{user}', [UserController::class, 'update'])->name('admin.dataUser.update');

// Menghapus pengguna
Route::delete('/admin/data-user/{user}', [UserController::class, 'destroy'])->name('admin.dataUser.destroy');