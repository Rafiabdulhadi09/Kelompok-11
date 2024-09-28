<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Materi;
use App\Models\DataKelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class MateriController extends Controller
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
            'judul' => 'required',
            'description' => 'required',
        ]);
        $materi = new Materi();
        $materi->title = $request->judul;
        $materi->content = $request->description;
        $materi->kelas_id = $request->kelas_id; // Pastikan ini ada!
        $materi->save();
            // Simpan materi
            $materi->save();

        if ($materi) {
            return redirect()->back()->with('success', 'Trainer berhasil di tambahkan.');
        }else {
            return redirect()->back()->withErrors('Username dan Password yang dimasukkan tidak valid.');
        }
    }
    public function materi(DataKelas $kelas){
        $materi = $kelas->materi;
        $trainer = User::findOrFail(auth()->user()->id);

        return view('trainer.materi', ['kelas' => $kelas, 'materi' => $materi, 'trainer'=>$trainer]);
    }
    public function destroy($id)
    {
        $materi = Materi::findOrFail($id);
        $materi->delete();

        return redirect()->back()->with('success','Materi Berhasil di Hapus');
    }
    public function edit($id)
    {
        $materi = Materi::findOrFail($id);
        return view('trainer.edit_materi', compact('materi'));
    }
    public function update(Request $request, $id)
    {
        $materi = Materi::findOrFail($id);

        $request->validate([
            'kelas_id'=>'required',
            'judul'=>'required',
            'description'=>'required'
        ]);
        $materi->update([
            'kelas_id'=> $request->kelas_id,
            'title'=> $request->judul,
            'content'=> $request->description
        ]);
        return redirect()->back()->with('success', 'Data kursus berhasil di edit');
    }
    public function materiadmin(DataKelas $kelas)
    {
        $materi = $kelas->materi;

        return view('admin.materi', ['kelas' => $kelas, 'materi' => $materi]);
    }    
    public function searchkelas(Request $request)
{
    $trainer = User::findOrFail(auth()->user()->id);
    // Ambil query pencarian dari input form
    $query = $request->input('query');

    // Cari data kelas berdasarkan kolom yang relevan (misal: title atau description)
    $kelas = DataKelas::where('title', 'like', '%' . $query . '%')
        ->orWhere('price', 'like', '%' . $query . '%')
        ->paginate(10);

    // Return hasil pencarian ke view 'trainer.tambahmateri'
    return view('trainer.tambahmateri', compact('kelas', 'trainer'));
}

        public function Trainer()
    {
          // Mengambil semua data dari tabel items
            $trainer = User::findOrFail(auth()->user()->id);
    // Ambil semua kelas yang terkait dengan trainer tersebut
            $kelas = $trainer->trainerKelas;

        // Mengirim data ke view
        return view('trainer.tambahmateri', compact('kelas','trainer',));
    }
}
