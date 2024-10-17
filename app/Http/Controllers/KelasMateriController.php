<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\DataKelas;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SubMateri;

class KelasMateriController extends Controller
{
    public function index (){
        $kelas = Pembayaran::where('user_id', auth()->id())
        ->where('status', 'approved') 
        ->with('kelas')->get();
        return view ('user.kelasmateri', compact('kelas'));
    }

    public function materi($id)
    {
        $submateri = DataKelas::with('materi')->findOrFail($id);
        return view('user.materi', compact('submateri'));
    }
    public function submateri($id)
    {
        $submateri = Materi::with('submateri')->findOrFail($id);
        return view('user.submateri', compact('submateri'));
    }
    public function belajar($id)
    {
        $data = SubMateri::all();
        $submateri = SubMateri::where('id', $id)->get();
        return view('user.belajar', compact('submateri','data'));
    }
    
}
