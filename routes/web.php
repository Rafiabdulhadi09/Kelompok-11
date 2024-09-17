<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DataKelasController;
use App\Http\Controllers\PelajaranController;
use App\Http\Controllers\ProfileTrainerController;

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
Route::middleware(['guest'])->group(function(){
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'registeruser'])->name('register');
    Route::post('/register/user', [RegisterController::class, 'create']);

     Route::get('/', function () {
    return view('welcome');
});
 Route::get('/kelas', function () {
    return view('kelas');
});
});
Route::middleware(['auth'])->group(function(){
    Route::get('/user',[AdminController::class,'index'])->middleware('userAkses:user');
    Route::get('/trainer',[AdminController::class,'trainer'])->middleware('userAkses:trainer');
    Route::get('/admin',[AdminController::class,'admin'])->middleware('userAkses:admin');
    Route::get('/logout', [LoginController::class,'logout'])->name('logout');
});

// Route untuk Data kursus
Route::get('/admin/DataKelas',[DataKelasController::class,'index'])->name('datakelas');
Route::get('/user/kelas',[DataKelasController::class,'show']);
Route::get('/user/materi',[DataKelasController::class,'store']);
Route::get('/create/kelas',[DataKelasController::class, 'kelas']);
Route::post('/kelas/create', [DataKelasController::class, 'create']);
Route::get('/datakursus/{id}/edit', [DataKelasController::class, 'editkursus'])->name('edit.datakursus');
Route::put('/kursus/{id}update', [DataKelasController::class, 'updatekursus'])->name('kursus.update');
Route::delete('/kursus/{id}destroy', [DataKelasController::class, 'destroykursus'])->name('kursus.destroy');
Route::get('/admin/Data-kelas/search', [DataKelasController::class, 'search'])->name('admin.data-kelas.search');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/profiletrainer', [ProfileTrainerController::class, 'index'])->name('profiletrainer');
Route::get('/profiletrainer/edit', [ProfileTrainerController::class, 'edit'])->name('profiletrainer.edit');
Route::put('/profiletrainer/update', [ProfileTrainerController::class, 'update'])->name('profiletrainer.update');

// Route untuk data user
Route::get('/admin/DataUser', [UserController::class, 'index'])->name('admin.DataUser');
Route::get('/admin/data-user/{user}/edit', [UserController::class, 'edituser'])->name('admin.dataUser.edit');
Route::put('/admin/data-user/{user}', [UserController::class, 'updateuser'])->name('admin.dataUser.update');
Route::delete('/admin/data-user/{user}', [UserController::class, 'destroy'])->name('admin.DataUser.destroy');
Route::get('admin/data-user/search', [UserController::class, 'search'])->name('admin.dataUser.search');


Route::get('Trainer/{trainer_id}/TambahMateri',[DataKelasController::class,'Trainer'])->name('Trainer.TambahMateri');

// Route untuk DataTrainer
Route::get('/admin/data-trainer/{user}/edit', [UserController::class, 'edittrainer'])->name('admin.dataTrainer.edit');
Route::put('/admin/data-trainer/{user}', [UserController::class, 'updatetrainer'])->name('admin.dataTrainer.update');
Route::get('/admin/Data-trainer', [UserController::class, 'trainer'])->name('admin.dataTrainer'); 
Route::get('create/trainer', [RegisterController::class, 'registertrainer'])->name('create/trainer');
Route::post('/register/create', [RegisterController::class, 'tambah'])->name('register.trainer');
Route::delete('/admin/data-trainer/{trainer}', [UserController::class, 'destroytrainer'])->name('admin.DataTrainer.destroy');
Route::get('/admin/data-trainer/search', [UserController::class, 'searchtrainer'])->name('admin.data-trainer.search');

Route::get('/trainer.create.materi', [PelajaranController::class, 'index'])->name('trainer.create.materi');
Route::post('/materi/create', [PelajaranController::class, 'create'])->name('materi.create');

Route::get('/kelas/{kelas}/materi', [PelajaranController::class, 'materi'])->name('materi');
Route::get('/materi/{id}/edit', [PelajaranController::class, 'edit'])->name('materi.edit');
Route::put('/materi/{id}/update', [PelajaranController::class, 'update'])->name('materi.update');
Route::delete('materi/{id}/destroy', [PelajaranController::class, 'destroy'])->name('materi.destroy');

Route::get('/admin/add-trainer', [DataKelasController::class, 'AddTrainerForm'])
    ->name('FormAddTrainer');
Route::post('/admin/add-trainer-to-class', [DataKelasController::class, 'addTrainerToClass'])
    ->name('addTrainerToClass');

Route::get('/user.payment', function () {
    return view('/user/payment');
});

Route::get('akses/belajar', function () {
    return view('user.materi');
});
