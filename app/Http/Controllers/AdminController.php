<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Materi;
use App\Models\DataKelas;
use App\Models\SubMateri;
use App\Models\Pembayaran;
use App\Models\MediaSosial;
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
        $jumlah_materi = $kelas->materi->count();
        $jumlah_submateri = SubMateri::all()->count();
        // Menghitung jumlah pengguna yang telah di-approve oleh admin
        // $jumlah_pengguna = User::whereHas('kelas', function($query) {
        //     $query->where('status', 'approved'); // Misalkan status 'approved' digunakan untuk menandakan kelas yang sudah di-approve
        // })->count();
    
        return view('trainer/index', compact('trainer', 'jumlah_kelas', 'jumlah_materi', 'jumlah_submateri',));
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

