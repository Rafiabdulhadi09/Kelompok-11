<?php

namespace App\Http\Controllers;

use App\Models\Kuis;
use App\Models\Materi;
use App\Models\KuisUser;
use App\Models\DataKelas;
use App\Models\SubMateri;
use App\Models\Pembayaran;
use App\Models\MediaSosial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KelasMateriController extends Controller
{
    public function index (){
        $kelas = Pembayaran::where('user_id', auth()->id())
        ->where('status', 'approved') 
        ->with('kelas')->paginate(15);
        $sosmed = MediaSosial::all();
        return view ('user.kelasmateri', compact('kelas','sosmed'));
    }

    public function materi($kelasId, $userId)
    {   
       // Ambil data materi, sertifikat, kuis, dan nilai user
$materiList = Materi::where('kelas_id', $kelasId)->get();
$sertifikat = KuisUser::whereIn('kelas_id', $materiList->pluck('id'))
                      ->where('user_id', $userId)
                      ->where('status', '1') 
                      ->get();
$submateri = DataKelas::with('materi')->findOrFail($kelasId);
$sosmed = MediaSosial::all();
$kuis = Kuis::where('kelas_id', $kelasId)->get();

// Ambil nilai user dari tabel KuisUser
$nilaiUser = KuisUser::where('user_id', $userId)
                     ->where('kelas_id', $kelasId)
                     ->first();  // Ambil nilai kuis user berdasarkan kelas_id dan user_id

// Jika nilai user tidak ada, set nilai default
$nilai = $nilaiUser ? $nilaiUser->nilai : 0;

        return view('user.materi', compact('materiList', 'sertifikat', 'submateri', 'sosmed', 'kuis', 'nilai'));
    }
    public function submateri($id)
    {
        $submateri = Materi::with('submateri')->findOrFail($id);
        $sosmed = MediaSosial::all();
        return view('user.submateri', compact('submateri','sosmed'));

    }
    public function belajar($id, $materi_id)
    {
        
        $user = auth()->user();
        $submateris = Submateri::findOrFail($id);
        $materi = $submateris->materi;
        $data = $materi->submateri;
        $submateri = SubMateri::where('id', $id)->where('materi_id', $materi_id)->paginate(10);
        
        return view('user.belajar', compact('submateri','data'),[
        'currentSubmateriId' => $id
    ]);
    }
    
}
