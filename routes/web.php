<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DataKelasController;
use App\Http\Controllers\PelajaranController;

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
Route::get('/register', [RegisterController::class, 'registeruser']);
Route::post('/register/create', [RegisterController::class, 'create']);

// Route untuk Data kursus
Route::get('/admin/DataKelas',[DataKelasController::class,'index']);
Route::get('/user/kelas',[DataKelasController::class,'show']);
Route::get('/create/kelas',[DataKelasController::class, 'kelas']);
Route::post('/kelas/create', [DataKelasController::class, 'create']);

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/profile/edit', [ProfileController::class, 'edit']);
// Route::put('/profile/edit/{user}', [ProfileController::class, 'update'])->name('profile.update');


// Route untuk data user
Route::get('/admin/DataUser', [UserController::class, 'index'])->name('admin.DataUser');
Route::get('/admin/data-user/ /edit', [UserController::class, 'edituser'])->name('admin.dataUser.edit');
Route::put('/admin/data-user/{user}', [UserController::class, 'updateuser'])->name('admin.dataUser.update');
Route::delete('/admin/data-user/{user}', [UserController::class, 'destroy'])->name('admin.DataUser.destroy');


Route::get('Trainer/TambahMateri',[DataKelasController::class,'Trainer'])->name('Trainer.TambahMateri');

// Route untuk DataTrainer
Route::get('/admin/data-trainer/{user}/edit', [UserController::class, 'edittrainer'])->name('admin.dataTrainer.edit');
Route::put('/admin/data-trainer/{user}', [UserController::class, 'updatetrainer'])->name('admin.dataTrainer.update');
Route::get('/admin/Data-trainer', [UserController::class, 'trainer'])->name('admin.dataTrainer'); 
Route::get('create/trainer', [RegisterController::class, 'registertrainer'])->name('create/trainer');
Route::post('/register/create', [RegisterController::class, 'tambah'])->name('register.create');
Route::delete('/admin/data-trainer/{user}', [UserController::class, 'destroytrainer'])->name('admin.DataTrainer.destroy');

Route::get('/trainer.create.materi', [PelajaranController::class, 'index'])->name('trainer.create.materi');
Route::post('/materi/create', [PelajaranController::class, 'create'])->name('materi.create');