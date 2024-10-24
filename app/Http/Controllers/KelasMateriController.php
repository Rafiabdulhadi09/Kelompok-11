<?php

namespace App\Http\Controllers;

use App\Models\Kuis;
use App\Models\Materi;
use App\Models\KuisUser;
use App\Models\DataKelas;
use App\Models\SubMateri;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KelasMateriController extends Controller
{
    public function index (){
        $kelas = Pembayaran::where('user_id', auth()->id())
        ->where('status', 'approved') 
        ->with('kelas')->get();
        return view ('user.kelasmateri', compact('kelas'));
    }

    public function materi($id, $kelasId, $userId)
    {   
        $materiList = Materi::where('kelas_id', $kelasId)->get();

        $totalMateri = $materiList->count();
        $completedKuisCount = KuisUser::whereIn('materi_id', $materiList->pluck('id'))
                                      ->where('user_id', $userId)
                                      ->where('status', '1') 
                                      ->count();

        $isCompleted = $totalMateri == $completedKuisCount;
        $submateri = DataKelas::with('materi')->findOrFail($id);
        return view('user.materi', compact('submateri'),[
            'materiList' => $materiList,
            'isCompleted' => $isCompleted, 
            'kelasId' => $kelasId
        ]);
    }
    public function submateri($id)
    {
        $kuis = Materi::with('kuis')->findOrFail($id);
        $submateri = Materi::with('submateri')->findOrFail($id);
        return view('user.submateri', compact('submateri','kuis'));
    }
    public function belajar($id, $materi_id)
    {
        
        $user = auth()->user();
        $submateris = Submateri::findOrFail($id);
        $materi = $submateris->materi;
        $data = $materi->submateri;
        $submateri = SubMateri::where('id', $id)->where('materi_id', $materi_id)->get();
        
        return view('user.belajar', compact('submateri','data'));
    }
    
}
