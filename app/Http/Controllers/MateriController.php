<?php

namespace App\Http\Controllers;

use App\Models\DataKelas;
use App\Models\Materi;
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
            'title' => 'required',
            'type' => 'required',
            'content' => 'required',
        ]);
        $materi = new Materi();
        $materi->title = $request->title;
        $materi->type = $request->type;
        $materi->content = $request->content;
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

        return view('trainer.materi', ['kelas' => $kelas, 'materi' => $materi]);
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
            'title'=>'required',
            'type'=>'required',
            'content'=>'required'
        ]);
        $materi->update([
            'kelas_id'=> $request->kelas_id,
            'title'=> $request->title,
            'type'=> $request->type,
            'content'=> $request->content
        ]);
        return redirect()->back()->with('success', 'Data kursus berhasil di edit');
    }
    public function materiadmin(DataKelas $kelas)
    {
        $materi = $kelas->materi;

        return view('admin.materi', ['kelas' => $kelas, 'materi' => $materi]);
    }    
    public function search(Request $request)
    {
        // Ambil query pencarian dari input form
        $query = $request->input('query');

        // Cari data kelas berdasarkan kolom yang relevan (misal: nama_kelas atau deskripsi)
        $data = DataKelas::where('title', 'like', '%' . $query . '%')
            ->orWhere('price', 'like', '%' . $query . '%')
            ->get();

        // Return hasil pencarian ke view 'admin.datakelas'
        return view('trainer.tambahmateri', compact('data'));
    }
}