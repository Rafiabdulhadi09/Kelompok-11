<?php

namespace App\Http\Controllers;

use App\Models\Kuis;
use App\Models\User;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\DataKelas;

class KuisController extends Controller
{
   public function index($kelas_id)
{
    $kuis = Kuis::where('kelas_id', $kelas_id)->get();
    $materi = DataKelas::findOrFail($kelas_id);

    return view('user.kuis', compact('kuis', 'materi'));
}
public function create(Request $request)
{
    $request->validate([
        'pertanyaan' => 'required|array',
        'pilihan_1' => 'required|array',
        'pilihan_2' => 'required|array',
        'pilihan_3' => 'required|array',
        'jawaban' => 'required|array',
        'kelas_id' => 'required',
    ]);

    $item = [
        'pertanyaan' => json_encode($request->pertanyaan),
        'pilihan_1' => json_encode($request->pilihan_1),
        'pilihan_2' => json_encode($request->pilihan_2),
        'pilihan_3' => json_encode($request->pilihan_3),
        'jawaban' => json_encode($request->jawaban),
        'kelas_id' => $request->kelas_id,
    ];

    Kuis::create($item);

    return redirect('/tambah/kuis')->with('success', 'Kursus Berhasil Di Tambahkan');
}

    public function submit(Request $request, $kelas_id)
    {
        $user = auth()->user();
        $jawaban = $request->input('pertanyaan'); 
        $pertanyaan = Kuis::where('kelas_id', $kelas_id)->get();

        $jawabanBenar  = 0;

        foreach ($pertanyaan as $item) {
            if (isset($jawaban[$item->id]) && $jawaban[$item->id] == $item->jawaban) {
                $jawabanBenar++; // Tambah jumlah jawaban yang benar
            }
        }

        $jumlahPertanyaan = $pertanyaan->count();
        $nilai = ($jumlahPertanyaan > 0) ? ($jawabanBenar / $jumlahPertanyaan) * 100 : 0;
        $status = $nilai >= 80;

         DB::table('kuis_user')->updateOrInsert(
            ['user_id' => $user->id, 'kelas_id' => $kelas_id], 
            ['nilai' => $nilai, 'status' => $status, 'updated_at' => now()]
        );

        // Redirect dengan pesan berdasarkan status kelulusan
        if ($status) {
            return redirect()->back()->with('success', 'Selamat! Anda lulus kuis dengan skor ' . round($nilai, 2) . '%.');
        } else {
            return redirect()->back()->with('error', 'Maaf, Anda belum lulus. Skor Anda adalah ' . round($nilai, 2) . '%. Silakan coba lagi.');
        }
    }
}

