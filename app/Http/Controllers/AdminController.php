<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DataKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{ 
    function index(){
        $user = Auth::user();
        return view('user/index', compact('user'));
    }
    function trainer(){
        $trainer= Auth::user();
        return view('trainer/index', compact('trainer'));
       
    }
    function admin(){
        $jumlah_user = User::where('role', 'user')->count();
        $jumlah_trainer =User::where('role','trainer')->count();
        $jumlah_kursus = DataKelas::all()->count();
        return view('admin/index', compact('jumlah_user', 'jumlah_trainer', 'jumlah_kursus'));
    }
    
}

