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

       public function materi(Materi $item)
    {
        $submateri = $item->submateri;
        return view('user.materi', ['submateri' => $submateri, 'item' => $item]);
    }
}
