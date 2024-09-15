<?php

namespace App\Http\Controllers;

use App\Models\DataKelas;
use App\Models\Pelajaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PelajaranController extends Controller
{
    public function index()
    {
        // Mengambil kelas berdasarkan ID
    $kelas = auth()->user()->trainerKelas;
    // Mengirim data kelas ke view
    return view('trainer.createmateri', compact('kelas'));
    }
    public function create(Request $request)
    {
         // Validasi data yang masuk
        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'content' => 'required',
        ]);
        $materi = new Pelajaran();
        $materi->title = $request->title;
        $materi->type = $request->type;
        $materi->content = $request->content;
        $materi->kelas_id = $request->kelas_id; // Pastikan ini ada!
        $materi->save();
            // Simpan materi
            $materi->save();

         if ($materi) {
            return redirect()->back()->with('success', 'Trainer berhasil di tambahkan.');
        } else {
            return redirect()->back()->withErrors('Username dan Password yang dimasukkan tidak valid.');
        }
    }
}
