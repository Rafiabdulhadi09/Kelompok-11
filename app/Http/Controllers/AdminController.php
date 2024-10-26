<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Materi;
use App\Models\DataKelas;
use App\Models\SubMateri;
use App\Models\Pembayaran;
use App\Models\MediaSosial;
use App\Models\KelasTrainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{ 
    function index(){
        $user = Auth::user();
        $sosmed = MediaSosial::all();
        return view('user/index', compact('user','sosmed'));
    }
    function trainer(DataKelas $kelas){
        $trainer= Auth::user();
        $jumlah_kelas = $trainer->trainerKelas->count();
        $kelas = KelasTrainer::where('user_id', $trainer->id)->get();
        $kelasIds = $kelas->pluck('id');
        $siswa = Pembayaran::whereIn('kelas_id', $kelasIds)
            ->where('status', 'approved')
            ->with('user')
            ->get(); 
        $totalSiswa = $siswa->count();
        $totalMateri = Materi::whereIn('kelas_id', $kelasIds)->count();
        $materi = Materi::whereIn('kelas_id', $kelasIds)->get();
        $totalSubmateri = Submateri::whereIn('materi_id', $materi->pluck('id'))->count();
        return view('trainer/index', compact('trainer', 'jumlah_kelas', 'totalSubmateri','totalSiswa','totalMateri'));
    }
    function admin(){
        $jumlah_user = User::where('role', 'user')->count();
        $jumlah_trainer =User::where('role','trainer')->count();
        $jumlah_kursus = DataKelas::all()->count();
        $totalHarga = Pembayaran::where('status', 'approved')
        ->with('kelas')
        ->get()
        ->sum(function($pembelian) {
            return $pembelian->kelas ? $pembelian->kelas->price : 0;
        });
        return view('admin/index', compact('jumlah_user', 'jumlah_trainer', 'jumlah_kursus', 'totalHarga'));
    }
    
}

