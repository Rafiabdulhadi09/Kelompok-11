<?php

use App\Models\SubMateri;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\YTController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DataKelasController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\SubmateriController;
use App\Http\Controllers\KelasMateriController;
use App\Http\Controllers\KuisController;
use App\Http\Controllers\ProfileTrainerController;
use App\Http\Controllers\SosialMediaController;
use App\Http\Controllers\TrainerkelasController;
use App\Models\Kuis;

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
    Route::get('/kursus', [DataKelasController::class, 'kursus'])->name('kursus');
    Route::get('/', [SosialMediaController::class, 'sosialmedia']);
});

//Hak  akses user
    Route::middleware(['auth'])->group(function(){
    Route::get('/user',[AdminController::class,'index'])->middleware('userAkses:user');
    Route::get('/user/kelas',[DataKelasController::class,'show'])->middleware('userAkses:user');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware('userAkses:user');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('userAkses:user');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update')->middleware('userAkses:user');
    Route::get('/user/{id}/payment/', [PembelianController::class, 'index'])->name('user.payment')->middleware('userAkses:user');
    Route::get('/user/kelas/materi',[KelasMateriController::class,'index'])->name('kelas.materi')->middleware('userAkses:user');
    Route::get('/user/{id}/materi/{kelasId}/{userId}', [KelasMateriController::class, 'materi'])->name('materi.user')->middleware('userAkses:user');
    Route::get('/user/{id}/submateri',[KelasMateriController::class,'submateri'])->name('submateri.user')->middleware('userAkses:user');
    Route::get('/user/{id}/belajar/{materi_id}', [KelasMateriController::class, 'belajar'])->name('belajar.user')->middleware('userAkses:user');
    Route::get('/bukti/{id}/pembayaran',[PembelianController::class,'pembayaran'])->name('bukti.pembayaran')->middleware('userAkses:user');
    Route::post('/kirim/bukti', [PembelianController::class, 'BuktiPembayaran'])->name('kirim.bukti')->middleware('userAkses:user');
    Route::get('/user/{kelas_id}/kuis', [KuisController::class, 'index'])->name('user.kuis')->middleware('userAkses:user');
    Route::post('/kirim/{submateri_id}/kuis', [KuisController::class, 'submit'])->name('kirim.kuis')->middleware('userAkses:user');
    Route::post('/buat', [UserController::class, 'sertifikat'])->name('sertifikat');

//Hak akses trainer
    Route::get('/trainer',[AdminController::class,'trainer'])->middleware('userAkses:trainer');
    Route::get('/profiletrainer', [ProfileTrainerController::class, 'index'])->name('profiletrainer')->middleware('userAkses:trainer');
    Route::get('/profiletrainer/edit', [ProfileTrainerController::class, 'edit'])->name('profiletrainer.edit')->middleware('userAkses:trainer');
    Route::put('/profiletrainer/update', [ProfileTrainerController::class, 'update'])->name('profiletrainer.update')->middleware('userAkses:trainer');
    Route::get('Trainer/TambahMateri',[MateriController::class,'Trainer'])->name('Trainer.TambahMateri')->middleware('userAkses:trainer');
    Route::get('trainer/tambahmateri/search', [MateriController::class, 'searchkelas'])->name('trainer.tambahmateri.search')->middleware('userAkses:trainer');
    Route::get('/trainer.create.materi', [MateriController::class, 'index'])->name('trainer.create.materi')->middleware('userAkses:trainer');
    Route::post('/materi/create', [MateriController::class, 'create'])->name('materi.create')->middleware('userAkses:trainer');
    Route::get('/kelas/{kelas}/materi', [MateriController::class, 'materi'])->name('materi')->middleware('userAkses:trainer');
    Route::get('/materi/{id}/edit', [MateriController::class, 'edit'])->name('materi.edit')->middleware('userAkses:trainer');
    Route::put('/materi/{id}/update', [MateriController::class, 'update'])->name('materi.update')->middleware('userAkses:trainer');
    Route::delete('materi/{id}/destroy', [MateriController::class, 'destroy'])->name('materi.destroy')->middleware('userAkses:trainer');
    Route::delete('submateri/{id}/destroy', [MateriController::class, 'destroysub'])->name('submateri.destroy')->middleware('userAkses:trainer');
    Route::get('submateri/{id}/edit', [MateriController::class, 'editsub'])->name('submateri.edit')->middleware('userAkses:trainer');
    Route::put('submateri/{id}/update', [MateriController::class, 'updatesub'])->name('submateri.update')->middleware('userAkses:trainer');
    Route::get('/materi/{materi}/submateri',[ SubmateriController::class, 'show'])->name('materi.submateri')->middleware('userAkses:trainer');
    Route::get('/tambah/submateri',[SubmateriController::class,'index'])->name('tambah.submateri')->middleware('userAkses:trainer');
    Route::post('/tambah/submateri',[SubmateriController::class,'create'])->name('create.submateri')->middleware('userAkses:trainer');
    Route::post('/create/kuis',[KuisController::class,'create'])->name('create.kuis')->middleware('userAkses:trainer');
    Route::get('/trainer/{kelasId}/kuis',[KuisController::class,'TrainerLihatKuis'])->name('lihat.kuis')->middleware('userAkses:trainer');
    Route::delete('/trainer/delete/{id}/kuis',[KuisController::class,'delete'])->name('delete.kuis')->middleware('userAkses:trainer');
    Route::put('/trainer/edit/{id}/kuis',[KuisController::class,'edit'])->name('edit.kuis')->middleware('userAkses:trainer');
    Route::get('/trainer/penggunakelas',[PembelianController::class,'pengguna'])->name('pengguna')->middleware('userAkses:trainer');

//Hak akses admin
    Route::get('/admin',[AdminController::class,'admin'])->middleware('userAkses:admin');
    Route::get('/create/kelas',[DataKelasController::class, 'kelas'])->middleware('userAkses:admin');
    Route::post('/kelas/create', [DataKelasController::class, 'create'])->middleware('userAkses:admin');
    Route::get('/datakursus/{id}/edit', [DataKelasController::class, 'editkursus'])->name('edit.datakursus')->middleware('userAkses:admin');
    Route::put('/kursus/{id}update', [DataKelasController::class, 'updatekursus'])->name('kursus.update')->middleware('userAkses:admin');
    Route::delete('/kursus/{id}destroy', [DataKelasController::class, 'destroykursus'])->name('kursus.destroy')->middleware('userAkses:admin');
    Route::get('/admin/Data-kelas/search', [DataKelasController::class, 'search'])->name('admin.data-kelas.search')->middleware('userAkses:admin');
    Route::get('/admin/DataKelas',[DataKelasController::class,'index'])->name('datakelas')->middleware('userAkses:admin');
    Route::get('/admin/DataUser', [UserController::class, 'index'])->name('admin.DataUser')->middleware('userAkses:admin');
    Route::get('/admin/data-user/{user}/edit', [UserController::class, 'edituser'])->name('admin.dataUser.edit')->middleware('userAkses:admin');
    Route::put('/admin/data-user/{user}', [UserController::class, 'updateuser'])->name('admin.dataUser.update')->middleware('userAkses:admin');
    Route::delete('/admin/data-user/{user}', [UserController::class, 'destroy'])->name('admin.DataUser.destroy')->middleware('userAkses:admin');
    Route::get('admin/data-user/search', [UserController::class, 'index'])->name('admin.dataUser.search')->middleware('userAkses:admin');
    Route::get('/admin/data-trainer/{user}/edit', [UserController::class, 'edittrainer'])->name('admin.dataTrainer.edit')->middleware('userAkses:admin');
    Route::put('/admin/data-trainer/{user}', [UserController::class, 'updatetrainer'])->name('admin.dataTrainer.update')->middleware('userAkses:admin');
    Route::get('/admin/Data-trainer', [UserController::class, 'trainer'])->name('admin.dataTrainer')->middleware('userAkses:admin'); 
    Route::get('create/trainer', [RegisterController::class, 'registertrainer'])->name('create/trainer')->middleware('userAkses:admin');
    Route::post('/register/create', [RegisterController::class, 'tambah'])->name('register.trainer')->middleware('userAkses:admin');
    Route::delete('/admin/data-trainer/{trainer}', [UserController::class, 'destroytrainer'])->name('admin.DataTrainer.destroy')->middleware('userAkses:admin');
    Route::get('/admin/data-trainer/search', [UserController::class, 'searchtrainer'])->name('admin.data-trainer.search')->middleware('userAkses:admin');
    Route::get('/admin/data-pembelian', [PembelianController::class, 'datapembelian'])->name('admin.DataPembelian')->middleware('userAkses:admin');
    Route::get('/admin/add-trainer', [DataKelasController::class, 'AddTrainerForm'])
    ->name('FormAddTrainer')->middleware('userAkses:admin');
    Route::post('/admin/add-trainer-to-class', [DataKelasController::class, 'addTrainerToClass'])
    ->name('addTrainerToClass')->middleware('userAkses:admin');
    Route::get('/admin/{kelas}/materi', [MateriController::class, 'materiadmin'])->name('lihat.materi')->middleware('userAkses:admin');
    Route::post('/pembayaran/approve/{id}', [PembelianController::class, 'approve'])->name('pembayaran.approve')->middleware('userAkses:admin');
    Route::post('/pembayaran/reject/{id}', [PembelianController::class, 'reject'])->name('pembayaran.reject')->middleware('userAkses:admin');
    Route::get('/filter', [PembelianController::class, 'filter'])->middleware('userAkses:admin');
    Route::get('admin/materi/{apaaja}/submateri',[ SubmateriController::class, 'submateri_admin'])->name('admin.materi.submateri')->middleware('userAkses:admin');
    Route::get('admin/setting/{id}', [SosialMediaController::class, 'index'])->name('admin.setting')->middleware('userAkses:admin');
    Route::put('/update/{id}/sosialmedia', [SosialMediaController::class, 'update'])->name('update_sosialmedia')->middleware('userAkses:admin');
    Route::get('/edit/trainer/kelas/{id}', [DataKelasController::class, 'edit'])->name('edit.trainer.kelas')->middleware('userAkses:admin');
    Route::put('/trainerkelas/{id}', [DataKelasController::class, 'updateTrainerToClass'])->name('updateTrainerToClass')->middleware('userAkses:admin');
    Route::get('/admin/{kelas_id}/trainerkelas', [TrainerkelasController::class, 'index'])->name('kelas.trainer')->middleware('userAkses:admin');
    Route::delete('/admin/Trainerkelas/{id}/delete', [TrainerkelasController::class, 'delete'])->name('trainerkelas.delete')->middleware('userAkses:admin');
    Route::get('/admin/{id}/datakuis', [KuisController::class, 'kuisadmin'])->name('kuis.admin')->middleware('userAkses:admin');

    
});
    Route::get('/logout', [LoginController::class,'logout'])->name('logout');
