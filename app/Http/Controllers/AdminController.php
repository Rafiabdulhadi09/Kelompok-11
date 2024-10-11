<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\SubMateri;
use App\Models\MediaSosial;
use App\Models\User;
use App\Models\DataKelas;
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
        return view('trainer/index', compact('trainer', 'jumlah_kelas', 'jumlah_materi', 'jumlah_submateri'));
       
    }
    function admin(){
        $jumlah_user = User::where('role', 'user')->count();
        $jumlah_trainer =User::where('role','trainer')->count();
        $jumlah_kursus = DataKelas::all()->count();
        return view('admin/index', compact('jumlah_user', 'jumlah_trainer', 'jumlah_kursus'));
    }
    
}

