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
    $kuis = DataKelas::with('kuis')->findOrFail($kelas_id);
    return view('user.kuis', compact('kuis'));
}
public function create(Request $request)
{
    $request->validate([
        'pertanyaan' => 'required',
        'pilihan_1' => 'required',
        'pilihan_2' => 'required',
        'pilihan_3' => 'required',
        'jawaban' => 'required',
        'kelas_id' => 'required',
    ]);

    $item = [
        'pertanyaan' => ($request->pertanyaan),
        'pilihan_1' => ($request->pilihan_1),
        'pilihan_2' => ($request->pilihan_2),
        'pilihan_3' => ($request->pilihan_3),
        'jawaban' => ($request->jawaban),
        'kelas_id' => $request->kelas_id,
    ];

    Kuis::create($item);

    return redirect()->back()->with('success', 'Kursus Berhasil Di Tambahkan');
}

    public function submit(Request $request, $kelas_id)
    {
        $user = auth()->user();
        $jawaban = $request->input('pertanyaan'); 
        $pertanyaan = Kuis::where('kelas_id', $kelas_id)->get();
        $kelas = DataKelas::find($kelas_id);

        $jawabanBenar  = 0;

        foreach ($pertanyaan as $item) {
            if (isset($jawaban[$item->id]) && $jawaban[$item->id] == $item->jawaban) {
                $jawabanBenar++; 
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
            return redirect()->route('materi.user', ['kelasId'=>$kelas->id , 'userId'=>$user->id])->with('success', 'Selamat! Anda lulus kuis dengan skor ' . round($nilai, 2) . '%.');
        } else {
            return redirect()->route('materi.user', ['kelasId'=>$kelas->id , 'userId'=>$user->id])->with('error', 'Maaf, Anda belum lulus. Skor Anda adalah ' . round($nilai, 2) . '%. Silakan coba lagi.');
        }
    }
    public function TrainerLihatKuis ($kelasId)
    {
        $trainer = User::findOrFail(auth()->user()->id);
        $kelas = DataKelas::with('kuis')->findOrFail($kelasId);

        return view('trainer.Kuis',compact('trainer'),[
            'kelas' => $kelas,
        ]);
    }
    public function delete($id)
    {
    $kuis = Kuis::findOrFail($id);
    $kuis->delete();

    return redirect()->back()->with('success', 'Kuis berhasil dihapus');
    }
    public function edit(Request $request, $id)
    {
          // Validasi data yang diinputkan
        $request->validate([
            'pertanyaan' => 'required|string|max:255',
            'pilihan_1' => 'required|string|max:255',
            'pilihan_2' => 'required|string|max:255',
            'pilihan_3' => 'required|string|max:255',
            'jawaban' => 'required|string|max:255',
        ]);

        // Temukan kuis berdasarkan ID
        $kuis = Kuis::findOrFail($id);

        // Update data kuis
        $kuis->pertanyaan = $request->input('pertanyaan');
        $kuis->pilihan_1 = $request->input('pilihan_1');
        $kuis->pilihan_2 = $request->input('pilihan_2');
        $kuis->pilihan_3 = $request->input('pilihan_3');
        $kuis->jawaban = $request->input('jawaban');

        // Simpan perubahan ke database
        $kuis->save();

        // Redirect atau berikan respon sukses
        return redirect()->back()->with('success', 'Kuis berhasil diperbarui');
    }
    public function kuisadmin($id)
    {
        $kuis = DataKelas::with('kuis')->findOrFail($id);
        return view('admin.DataKuis', compact('kuis'));
    }
}

