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
    public function tambah(DataKelas $kelas)
    {
        $materi = $kelas->materi;
        $trainer = User::findOrFail(auth()->user()->id);
        $data = Materi::all();
        return view('trainer.TambahKuis', compact('data'),['kelas' => $kelas, 'materi' => $materi, 'trainer'=>$trainer]);
    }
   public function index($materi_id)
{
    $kuis = Kuis::where('materi_id', $materi_id)->get();
    $materi = Materi::findOrFail($materi_id);

    return view('user.kuis', compact('kuis', 'materi'));
}
    public function create(Request $request)
    {
          $request->validate([
        'pertanyaan' => 'required',
        'pilihan_1' => 'required',
        'pilihan_2' => 'required',
        'pilihan_3' => 'required',
        'jawaban' => 'required',
        'materi_id' => 'required'
       ], [
        'pertanyaan.required' => 'pertanyaan Wajib Diisi',
        'pilihan_1.required' => 'pilihan Wajib Diisi',
        'pilihan_2.required' => 'pilihan Wajib Diisi',
        'pilihan_3.required' => 'pilihan Wajib Diisi',
        'jawaban.required' => 'jawaban Wajib Diisi',
        'materi_id.required' => 'materi id wajib di isi',
       ]); 
       
       $item = [
        'pertanyaan'=>$request->pertanyaan,
        'pilihan_1'=>$request->pilihan_1,
        'pilihan_2'=>$request->pilihan_2,
        'pilihan_3'=>$request->pilihan_3,
        'jawaban'=>$request->jawaban,
        'materi_id'=>$request->materi_id,
       ];
       Kuis::create($item);
      if ($item) {
        // Berhasil menyimpan data
        return redirect('/tambah/kuis')->with('success', 'Kursus Berhasil Di Tambahkan');
    } else {
        // Gagal menyimpan data
        return redirect()->back()->with('error', 'Failed to create new record');
    }
    }
    public function submit(Request $request, $materi_id)
    {
        $user = auth()->user();
        $jawaban = $request->input('pertanyaan'); 
        $pertanyaan = Kuis::where('materi_id', $materi_id)->get();

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
            ['user_id' => $user->id, 'materi_id' => $materi_id], 
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

